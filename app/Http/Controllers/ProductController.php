<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\cart;

use App\Product;
use Illuminate\Http\Request;

// use Gloudemans\Shoppingcart\Facades\cart;

class ProductController extends Controller
{
    public function index()
    {

        // dd(cart::content());
        $products=Product::inRandomOrder()->take(6)->get();

        return view('products.index')->with('products',$products);
    }
    public function show($slug)
    {
        $product = Product::where('slug',$slug)->firstorfail();
        return view('products.show')->with('product', $product);
    }
}
