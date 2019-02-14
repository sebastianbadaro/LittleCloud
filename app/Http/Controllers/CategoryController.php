<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;

class CategoryController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function show()
  {
    $categories = Category::orderby('name')->with('products')->get();
    return view('categories.categories',compact('categories'));
  }

  public function new()
  {
    $category = new Category();
    return view('categories.newCategory',compact('category'));
  }

  public function edit(Category $category)
  {
    return view('categories.editCategory',compact('category'));
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
  $category = new Category;
  $category->name= $request->name;
  $category->save();

  return redirect('/categorias/');
  }

  public function update(Category $category, Request $request)
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

  $category->name= $request->name;
  $category->save();

  return redirect('/categorias/');
  }
  public function detail(Category $category)
  {
    $products = Product::where('category_id', $category->id)->get();
    return view('categories.detail',compact('category','products'));
  }

}
