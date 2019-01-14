<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Client;
class DashboardController extends Controller
{
  public function show()
  {
    $totalValueOfStock= Product::valueOfStock();
    $amountofItemsInStock = Product::amountofItemsInStock();
    $totalAmountOfClients = Client::totalAmountOfClients();
    return view('dashboards.dashboard',compact('totalValueOfStock','amountofItemsInStock','totalAmountOfClients'));
  }
}
