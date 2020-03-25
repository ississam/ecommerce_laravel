<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\cart;

use App\Product;
use APP\Category;
use Illuminate\Http\Request;

// use Gloudemans\Shoppingcart\Facades\cart;

class ProductController extends Controller
{
    public function index()
    {
        if (request()->categorie) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->categorie);
            })->paginate(6);
        } else {
            $products = Product::with('categories')->paginate(6);
        }

        // dd(cart::content());


        return view('products.index')->with('products',$products);
    }
    public function show($slug)
    {
        $product = Product::where('slug',$slug)->firstorfail();
        return view('products.show')->with('product', $product);
    }
}
