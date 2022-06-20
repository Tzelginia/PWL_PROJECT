<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::latest();

        if (request('search')) {
            $products->where('nama', 'like', '%' . request('search') . '%');
        }

        return view('product', [
            "title" => "Product",
            "product" => $products->get()
        ]);
    }

    public function show($id)
    {
        return view('productDetail', [
            "title" => "Product",
            'product' => Product::find($id)
        ]);
    }
}
