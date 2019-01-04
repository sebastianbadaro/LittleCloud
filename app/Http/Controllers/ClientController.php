<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Gender;

class ClientController extends Controller
{
  public function show()
  {
    $clients = Client::orderby('lastname')->with('gender')->get();
    return view('clients.clients',compact('clients'));
  }
}
