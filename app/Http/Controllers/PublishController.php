<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PublishController extends Controller
{
    function index() {
        $data['product'] = Product::all();
        return view('publish.index',$data);
    }
}
