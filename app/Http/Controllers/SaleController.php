<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;

class SaleController extends Controller
{
  public function show()
  {
    $sales = Sale::orderby('id')->with('client')->with('paymenttype')->get();
    return view('Sales.sales',compact('sales'));
  }
}
