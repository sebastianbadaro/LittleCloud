
@extends('layouts.app')

@section('title')
  Clientes
@endsection


@section('content')

  <h1>Clientes</h1>
  {{-- <a class="float-right btn btn-success btn-lg" href="/admin/productos/agregar">Nuevo</a> --}}
  <br>
  @include('clients.datatable')

@endsection


{{-- <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <table id="example2" class="table table-bordered table-hover">
  <thead>
  <tr>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Email</th>
    <th>Telefono</th>
    <th>DNI</th>
    <th>Direccion</th>
    <th>Cumpleaños</th>
    <th>Genero</th>
    <th># Compras</th>
    <th>Total Gastado</th>

  </tr>
  </thead>
  <tbody>
    @foreach($clients as $client)
        <tr>
          <td>  {{ $client->lastname }} </td>
          <td>  {{ $client->firstname }} </td>
          <td>  {{ $client->email }} </td>
          <td>  {{ $client->phone }} </td>
          <td>  {{ $client->DNI }} </td>
          <td>  {{ $client->address }} </td>
          <td>  {{ $client->birthdate }} </td>
          <td>  {{ $client->gender->name }} </td>
          <td>  {{ $client->totalPurchases() }} </td>
          <td>  ${{ $client->totalSpent() }} </td>
        </tr>
      @endforeach

  </tbody>
</table>


  </body>
</html> --}}
