<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Product;
use App\Category;
use App\Brand;
use App\Season;
use App\ProductGender;

class ProductController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function show()
  {
    $products = Product::orderby('id')->get();
    //dd($products);
    return view('products.products',compact('products'));
  }

  public function addstock()
  {
    return view('products.addstock');
  }

  public function showProductApi($code)

  {

    $product = Product::where('code',$code)->first();

    $product->stock = $product->stock+1;
    $product->save();
    return $product->toJson();
  }

  public function detail(Product $product )
  {
  return view('products.detail',compact('product'));
  }

  public function new()
  {
    $product = new Product();
    $categories= Category::orderby('name')->get();
    $brands= Brand::orderby('name')->get();
    $seasons= Season::orderby('name')->get();
    $productgenders= ProductGender::orderby('name')->get();

    return view('products.newProduct',compact('product','categories','brands','seasons','productgenders'));
  }

  public function save(Request $request)
  {

    $this->validate(
      $request,
      [
          'code' => 'required|max:60|unique:products'  ,
          'price' => 'required|numeric',
          'size' => 'required|max:60',
          'description'=> 'required|max:60',
          'ageTarget'=> 'required|numeric',

          'category_id'=> 'required|exists:categories,id',
          'brand_id'=>'required|exists:brands,id',
          'season_id'=>'required|exists:seasons,id',
          'productGender_id'=>'required|exists:productgenders,id',

      ],
      [

      ],
      [
        'code' => 'codigo',
        'price' => 'precio',
        'size' => 'talle',
        'description'=> 'descripcion',
        'ageTarget'=> 'edadEstimada',
        'stock'=> 'stock',
        'category_id'=> 'categoria',
        'brand_id'=>'marca',
        'season_id'=>'temporada',
        'productGender_id'=>'genero',
      ]
  );
    $product = new Product;
    $product->stock=0;
    $product->fill($request->all());
    $product->save();


        return response($request, 200)
                  ->header('Content-Type', 'text/plain');//Response::json($response);  // <<<<<<<<< see this line

  }
  public function success()
  {
      return view('products.success');
  }
}
