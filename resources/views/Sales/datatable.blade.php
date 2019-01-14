@extends('layouts.datatable')

@section('header')
  <th>ID</th>
  <th>Cliente</th>
  <th>Tipo de pago</th>
  <th>Fecha</th>
  <th>Total</th>
  
@endsection

@section('body')
  @foreach($sales as $sale)
    <tr>
      <td>  {{ $sale->id }} </td>
      <td>  {{ $sale->client->lastname }} {{ $sale->client->firstname }} </td>
      <td>  {{ $sale->paymenttype->name }} </td>
      <td>  {{ $sale->created_at }} </td>
      <td>  ${{ $sale->totalAmount() }} </td>



    </tr>
  @endforeach
@endsection