
@extends('layouts.app')

@section('title')
  Productos
@endsection


@section('content')

@if ($products->where('price',0)->count())
  <div class="alert alert-warning" role="alert">
  Hay {{$products->where('price',0)->count()}} articulo/s con precio $0.
  </div>
@endif



  <h1>Productos</h1>
  {{-- <a class="float-right btn btn-success btn-lg" href="/admin/productos/agregar">Nuevo</a> --}}
  <br>
   {{-- <div class="loader"></div>  --}}
  @include('products.datatable')

@endsection

<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
</script>
