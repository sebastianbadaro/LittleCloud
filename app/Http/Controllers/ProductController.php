<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Product;

class ProductController extends Controller
{
  public function show()
  {
    $products = Product::orderby('id')->with('sale')->get();
    return view('products.products',compact('products'));
  }
}
