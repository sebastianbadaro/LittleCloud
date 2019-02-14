
@extends('layouts.app')

@section('title')
  Categorías
@endsection


@section('content')

  <h1>Categorías</h1>
  {{-- <a class="float-right btn btn-success btn-lg" href="/admin/productos/agregar">Nuevo</a> --}}
  <br>
  @include('categories.datatable')

@endsection
