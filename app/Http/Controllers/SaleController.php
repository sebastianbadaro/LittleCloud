<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Client;

class SaleController extends Controller
{
  public function show()
  {
    //dd(Sale::find(1)->products()->get());
    $sales = Sale::orderby('id')->with('client')->with('paymenttype')->get();
    return view('Sales.sales',compact('sales'));
  }

  public function new()
  {
    $clients = Client::orderby('lastname')->get();
    return view('Sales.newSale',compact('clients'));
  }
}
