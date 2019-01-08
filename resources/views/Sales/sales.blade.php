
@extends('layouts.app')

@section('title')
  Ventas
@endsection


@section('content')

  <h1>Ventas</h1>
  {{-- <a class="float-right btn btn-success btn-lg" href="/admin/productos/agregar">Nuevo</a> --}}
  <br>
  @include('Sales.datatable')

@endsection
