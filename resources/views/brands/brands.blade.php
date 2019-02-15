
@extends('layouts.app')

@section('title')
  Marcas
@endsection


@section('content')

  <h1>Marcas</h1>
  {{-- <a class="float-right btn btn-success btn-lg" href="/admin/productos/agregar">Nuevo</a> --}}
  <br>
  @include('brands.datatable')

@endsection
