<?php

namespace App\Http\Controllers\Api;
use App\Models\Product;
use App\Models\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data['product'] = Product::all();
        return $data;
    }
}
