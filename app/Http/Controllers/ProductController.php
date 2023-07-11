<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['product'] = Product::all();
        return view('product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['category'] = Category::all();
        return view('product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);      

        // khusus simpan file
		$file = $request->file('image'); // menyimpan data file yang diupload ke variabel "$file"
		$nama_file = time()."_".$file->getClientOriginalName(); //mengubah dan mengambil nama file, nama file akan disimpan ke database.
		$tujuan_upload = public_path('images'); //isi dengan nama folder tempat kemana file diupload
		$file->move($tujuan_upload,$nama_file); //menaruh file yang sudah disesuaikan nama filenya ke folder penyimpanan project.
        Product::create([
            'category_id' => $request->category_id,
            'image' => $nama_file,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);
        return redirect()->route('product.index')->with('success','Product updated successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['category'] = Category::all();
        $data['product'] = Product::find($id);
        return view('product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // return $request->all();
         $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);      

        $product = Product::find($id);
        if(!empty($request->file('image'))){
            $file = $request->file('image'); // menyimpan data file yang diupload ke variabel "$file"
            $nama_file = time()."_".$file->getClientOriginalName(); //mengubah dan mengambil nama file, nama file akan disimpan ke database.
            $tujuan_upload = public_path('images'); //isi dengan nama folder tempat kemana file diupload
            $file->move($tujuan_upload,$nama_file); //menaruh file yang sudah disesuaikan nama filenya ke folder penyimpanan project.
            File::delete('images/'.$product->image);
        }else{
            $nama_file = $product->image;
        }
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->image = $nama_file;
        $product->update();

        return redirect()->route('product.index')->with('success','Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        File::delete('images/'.$product->image);
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }
}
