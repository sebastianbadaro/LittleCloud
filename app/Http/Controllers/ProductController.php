<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Product;

class ProductController extends Controller
{
  public function show()
  {
    $products = Product::orderby('id')->get();
    //dd($products);
    return view('products.products',compact('products'));
  }

  public function test()
  {
    return view('layouts.home');
  }
}
