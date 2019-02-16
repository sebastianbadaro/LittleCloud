<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

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
            ->orderby('count','DESC')
            ->havingRaw('count > 0')
            ->get();
    $brands = DB::table('brands')
            ->join('products', 'brands.id', '=', 'products.brand_id')
            ->select(DB::raw('brands.name, sum(products.stock) as count'))
            ->groupBy('brands.name')
            ->orderby('count','DESC')
            ->havingRaw('count > 0')
            ->get();
    $genders = DB::table('genders')
            ->join('clients', 'genders.id', '=', 'clients.gender_id')
            ->select(DB::raw('genders.name, count(*) as count'))
            ->groupBy('genders.name')
            ->orderby('count','DESC')
            ->get();
    $paymentTypes = DB::table('sales')
            ->join('payment_types', 'payment_types.id', '=', 'sales.paymentType_id')
            ->select(DB::raw('payment_types.name, count(*) as count'))
            ->groupBy('payment_types.name')
            ->orderby('count','DESC')
            ->havingRaw('count > 0')
            ->get();

    $today = Carbon::now();

    $lastMonthSales = DB::table('sales')
            // ->join('payment_types', 'payment_types.id', '=', 'sales.paymentType_id')
            ->select(DB::raw("dayofmonth(created_at), coalesce(count(*),0) as count"))
            ->whereMonth("created_at", $today->month)
            ->whereYear('created_at', $today->year)
            ->groupBy("dayofmonth(created_at)")
            ->orderby('dayofmonth(created_at)','ASC')
            // ->havingRaw('count > 0')
            ->get();

    // dd($categorias);
    $totalValueOfStock= Product::valueOfStock();
    $amountofItemsInStock = Product::amountofItemsInStock();
    $totalAmountOfClients = Client::totalAmountOfClients();
    return view('dashboards.dashboard',compact('totalValueOfStock','amountofItemsInStock','totalAmountOfClients','categorias','brands','genders','paymentTypes','lastMonthSales'));
  }
}
