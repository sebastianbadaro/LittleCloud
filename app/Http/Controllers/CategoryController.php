<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Subcategory;
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
    $subcategories = Subcategory::orderby('name')->get();
    return view('categories.newCategory',compact('category','subcategories'));
  }

  public function edit(Category $category)
  {
    $subcategories = Subcategory::orderby('name')->get();
    return view('categories.editCategory',compact('category','subcategories'));
  }

  public function save(Request $request)
  {
    $this->validate(
      $request,
      [
          'name' => 'required|max:100',
          'subcategory_id' => 'required|exists:subcategories,id',
      ],
      [

      ],
      [
          'name' => 'nombre',
          'subcategory_id' => 'subcategoria',
      ]
  );
  $category = new Category;
  $category->fill($request->all());
  $category->save();
notify()->flash('Categoria agregada correctamente','success');
  return redirect('/categorias/');
  }

  public function update(Category $category, Request $request)
  {
    // dd($request);
    $this->validate(
      $request,
      [
          'name' => 'required|max:100',
          'subcategory_id' => 'required|exists:subcategories,id',
      ],
      [

      ],
      [
          'name' => 'nombre',
          'subcategory_id' => 'subcategoria',
      ]
  );

  $category->fill($request->all());
  $category->save();
notify()->flash('Categoria agregada correctamente','success');
  return redirect('/categorias/');
  }
  public function detail(Category $category)
  {
    $products = Product::where('category_id', $category->id)->get();
    return view('categories.detail',compact('category','products'));
  }

}
