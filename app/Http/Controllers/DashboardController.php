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
        ->select(DB::raw("DATE_FORMAT(created_at, '%H') as hour, coalesce(sum(price*amount),0) as sum,coalesce(count(*),0) as count"))
        ->groupBy("hour")
        ->orderby('hour','ASC')
        ->get();

$SalesByWeekDay =DB::table('product_sale')
        ->select(DB::raw("DAYOFWEEK(created_at) as daynumber,DAYNAME(created_at) as dayname, coalesce(sum(price*amount),0) as sum,coalesce(count(*),0) as count"))
        ->groupBy("daynumber")
        ->groupBy("dayname")
        ->orderby('daynumber','ASC')
        ->get();



return view('dashboards.dashboardHistoric',compact('SalesAmountByMonth','SalesByHour','SalesByWeekDay'));

}

public function MonthlySales()
{

  //TODO: move this logic to each model




  $today = Carbon::now();

  $currentMonthSales = DB::table('sales')
          // ->join('payment_types', 'payment_types.id', '=', 'sales.paymentType_id')
          ->select(DB::raw("dayofmonth(created_at), coalesce(count(*),0) as count"))
          ->whereMonth("created_at", $today->month)
          ->whereYear('created_at', $today->year)
          ->groupBy("dayofmonth(created_at)")
          ->orderby('dayofmonth(created_at)','ASC')
          // ->havingRaw('count > 0')
          ->get();

  //This is to add the missing date, when nothing was sold.
          for ($i=1; $i <= $today->day; $i++) {

            if(!$currentMonthSales->contains('dayofmonth(created_at)',$i))
              $currentMonthSales->push((object)['dayofmonth(created_at)' => $i,'count' => 0]);
          }
          $currentMonthSales = $currentMonthSales->sortBy('dayofmonth(created_at)');

$currentmonthSalesAmountByDay =DB::table('product_sale')
        ->select(DB::raw("dayofmonth(created_at), coalesce(sum(price*amount),0) as amountSold,coalesce(sum(amount),0) as soldItems"))
        ->whereMonth("created_at", $today->month)
        ->whereYear('created_at', $today->year)
        ->groupBy("dayofmonth(created_at)")
        ->orderby('dayofmonth(created_at)','ASC')
        // ->havingRaw('count > 0')
        ->get();

        $subcategorias = DB::table('categories')
                ->join('products', 'categories.id', '=', 'products.category_id')
                ->join('subcategories',  'categories.subcategory_id', '=', 'subcategories.id')
                ->join('product_sale',  'products.id', '=', 'product_sale.product_id')
                ->select(DB::raw('subcategories.name, sum(product_sale.amount) as count'))
                ->whereMonth("product_sale.created_at", $today->month)
                ->whereYear('product_sale.created_at', $today->year)
                ->groupBy('subcategories.name')
                ->orderby('count','DESC')
                ->havingRaw('count > 0')
                ->get();

          $brands = DB::table('brands')
                  ->join('products', 'brands.id', '=', 'products.brand_id')
                  ->join('product_sale',  'products.id', '=', 'product_sale.product_id')
                  ->select(DB::raw('brands.name, sum(product_sale.amount) as count'))
                  ->whereMonth("product_sale.created_at", $today->month)
                  ->whereYear('product_sale.created_at', $today->year)
                  ->groupBy('brands.name')
                  ->orderby('count','DESC')
                  ->havingRaw('count > 0')
                  ->get();
          //This is to add the missing date, when nothing was sold.
        for ($i=1; $i <= $today->day; $i++) {
          if(!$currentmonthSalesAmountByDay->contains('dayofmonth(created_at)',$i))
            $currentmonthSalesAmountByDay->push((object)['dayofmonth(created_at)' => $i,'amountSold' => 0,'soldItems' => 0]);
        }
        $currentmonthSalesAmountByDay = $currentmonthSalesAmountByDay->sortBy('dayofmonth(created_at)');



    $thisMonthTotalSales = $currentmonthSalesAmountByDay->sum('amountSold');
    $thisMonthAmountOfSales = $currentMonthSales->sum('count');
    $thisMonthSoldItems = $currentmonthSalesAmountByDay->sum('soldItems');




  return view('dashboards.dashboard',compact('currentMonthSales','currentmonthSalesAmountByDay','thisMonthTotalSales','thisMonthAmountOfSales','thisMonthSoldItems','subcategorias','brands'));
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

  //  notify->flash('testing','error');
    // dd($categorias);
    $totalValueOfStock= Product::valueOfStock();
    $amountofItemsInStock = Product::amountofItemsInStock();
    $totalAmountOfClients = Client::totalAmountOfClients();
    return view('dashboards.dashboardStock',compact('totalValueOfStock','amountofItemsInStock','subcategorias','brands'));
  }
  }
