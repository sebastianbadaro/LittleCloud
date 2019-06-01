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

public function historicSales()
{
  $SalesAmountByMonth =DB::table('product_sale')
          ->select(DB::raw("DATE_FORMAT(created_at, '%m-%Y') as period, DATE_FORMAT(created_at, '%Y') as year, DATE_FORMAT(created_at, '%m') as month, coalesce(sum(price*amount),0) as sum,coalesce(count(*),0) as count"))
          ->groupBy("period")
          ->groupBy("year")
          ->groupBy("month")
          ->orderby('year','ASC')
          ->orderby('month','ASC')
          // ->havingRaw('count > 0')
          ->get();

          $SalesByHour =DB::table('product_sale')
                  ->select(DB::raw("DATE_FORMAT(created_at, '%h') as hour, coalesce(sum(price*amount),0) as sum,coalesce(count(*),0) as count"))
                  ->groupBy("hour")
                  ->orderby('hour','ASC')
                  ->get();

            return view('dashboards.dashboardHistoric',compact('SalesAmountByMonth','SalesByHour'));

}

  public function MonthlySales()
  {

    //TODO: move this logic to each model



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

    $currentmonthSalesAmountByDay =DB::table('product_sale')
            ->select(DB::raw("dayofmonth(created_at), coalesce(sum(price*amount),0) as sum"))
            ->whereMonth("created_at", $today->month)
            ->whereYear('created_at', $today->year)
            ->groupBy("dayofmonth(created_at)")
            ->orderby('dayofmonth(created_at)','ASC')
            // ->havingRaw('count > 0')
            ->get();

            $thisMonthSoldItems =DB::table('product_sale')
                    ->select(DB::raw("dayofmonth(created_at), coalesce(sum(amount),0) as sum"))
                    ->whereMonth("created_at", $today->month)
                    ->whereYear('created_at', $today->year)
                    ->groupBy("dayofmonth(created_at)")
                    ->orderby('dayofmonth(created_at)','ASC')
                    // ->havingRaw('count > 0')
                    ->get()->sum('sum');


    $thisMonthTotalSales = $currentmonthSalesAmountByDay->sum('sum');
    $thisMonthAmountOfSales = $lastMonthSales->sum('count');
    // dd($categorias);
    $totalValueOfStock= Product::valueOfStock();
    $amountofItemsInStock = Product::amountofItemsInStock();
    $totalAmountOfClients = Client::totalAmountOfClients();
    return view('dashboards.dashboard',compact('lastMonthSales','currentmonthSalesAmountByDay','thisMonthTotalSales','thisMonthAmountOfSales','thisMonthSoldItems'));
  }

  public function Stock()
  {

    //TODO: move this logic to each model

    $subcategorias = DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.category_id')
            ->join('subcategories',  'categories.subcategory_id', '=', 'subcategories.id')
            ->select(DB::raw('subcategories.name, sum(products.stock) as count'))
            ->groupBy('subcategories.name')
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


    $today = Carbon::now();


    // dd($categorias);
    $totalValueOfStock= Product::valueOfStock();
    $amountofItemsInStock = Product::amountofItemsInStock();
    $totalAmountOfClients = Client::totalAmountOfClients();
    return view('dashboards.dashboardStock',compact('totalValueOfStock','amountofItemsInStock','subcategorias','brands'));
  }
  }
