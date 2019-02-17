<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Client;
use App\PaymentType;
use App\Product;


class SaleController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function show()
  {
    //dd(Sale::find(1)->products()->get());
    $sales = Sale::orderby('id','DESC')->with('client')->with('paymenttype')->get();

    return view('Sales.sales',compact('sales'));
  }

  public function new()
  {
    $clients = Client::orderby('lastname')->get();
    $paymentTypes = PaymentType::orderby('name')->get();
    return view('Sales.newSale',compact('clients','paymentTypes'));
  }

  public function save(Request $request)
  {
    $newSale = new Sale();
    $newSale->client_id = $request->client_id;
    $newSale->paymentType_id = $request->paymenttype_id;
    $newSale->save();

    foreach ($request->products as  $productid)
    {
      $product = Product::find($productid);
      $fieldname="count_".$product->id;
      $newSale->products()->attach($product->id,
      [
      'amount' => $request->input($fieldname),
       'price' =>$product->price
     ]);
     $product->stock=$product->stock-$request->input($fieldname);
     $product->save();
    }
      $sales = Sale::orderby('created_at','DESC')->with('client')->with('paymenttype')->get();
      return view('Sales.sales',compact('sales'));
  }
  public function detail(Sale $sale)
  {
    // dd($sale->id);
  return view('Sales.details',compact('sale'));
  }
}
