<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brand;
use App\Product;

class BrandController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function show()
  {
    $brands = Brand::orderby('name')->with('products')->get();
    return view('brands.brands',compact('brands'));
  }

  public function new()
  {
    $brand = new Brand();
    return view('brands.newBrand',compact('brand'));
  }

  public function edit(Brand $brand)
  {
    return view('brands.editBrand',compact('brand'));
  }

  public function save(Request $request)
  {
    $this->validate(
      $request,
      [
          'name' => 'required|max:100',
      ],
      [

      ],
      [
          'name' => 'nombre',
      ]
  );
  $brand= new Brand;
  $brand->name= $request->name;
  $brand->save();

  return redirect('/marcas/');
  }

  public function update(Brand $brand, Request $request)
  {
    $this->validate(
      $request,
      [
          'name' => 'required|max:100',

      ],
      [

      ],
      [
          'name' => 'nombre',

      ]
  );

  $brand->name= $request->name;
  $brand->save();

  return redirect('/marcas/');
  }
  public function detail(Brand $brand)
  {
    $products = Product::where('brand_id', $brand->id)->get();
    return view('brands.detail',compact('brand','products'));
  }
}
