<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Product;
use App\Client;
use App\Category;
class DashboardController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function show()
  {

    //TODO: move this logic to each model

    $categorias = DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.category_id')
            ->select(DB::raw('categories.name, sum(products.stock) as count'))
            ->groupBy('categories.name')
            ->get();
    $brands = DB::table('brands')
            ->join('products', 'brands.id', '=', 'products.brand_id')
            ->select(DB::raw('brands.name, sum(products.stock) as count'))
            ->groupBy('brands.name')
            ->get();
    $genders = DB::table('genders')
            ->join('clients', 'genders.id', '=', 'clients.gender_id')
            ->select(DB::raw('genders.name, count(*) as count'))
            ->groupBy('genders.name')
            ->get();
    $paymentTypes = DB::table('sales')
            ->join('payment_types', 'payment_types.id', '=', 'sales.paymentType_id')
            ->select(DB::raw('payment_types.name, count(*) as count'))
            ->groupBy('payment_types.name')
            ->get();

    // dd($categorias);
    $totalValueOfStock= Product::valueOfStock();
    $amountofItemsInStock = Product::amountofItemsInStock();
    $totalAmountOfClients = Client::totalAmountOfClients();
    return view('dashboards.dashboard',compact('totalValueOfStock','amountofItemsInStock','totalAmountOfClients','categorias','brands','genders','paymentTypes'));
  }
}
