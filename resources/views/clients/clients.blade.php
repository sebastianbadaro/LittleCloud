
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
