@extends('layouts.datatable')

@section('header')
  <th>ID</th>
  <th>Cliente</th>
  <th>Tipo de pago</th>
  <th>Fecha</th>
  <th>Total</th>
  <th>Detalle</th>

@endsection

@section('body')
  @foreach($sales as $sale)
    <tr >
      <td> <a >{{ $sale->id }}   </a> </td>
      <td>  {{ $sale->client->lastname }} {{ $sale->client->firstname }} </td>
      <td>  {{ $sale->paymenttype->name }} </td>
      <td>  {{ $sale->created_at }} </td>
      <td>  ${{ $sale->totalAmount() }} </td>
      <td class="text-center fancybox" href="{{ route('detail-sale', compact('sale')) }}""> <a><b class="fa fa-eye "></b></a> </td>



    </tr>
  @endforeach
@endsection
