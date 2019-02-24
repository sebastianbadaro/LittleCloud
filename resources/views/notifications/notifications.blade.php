@extends('layouts.app')

@section('title')
  Notificaciones
@endsection


@section('content')

  <h1>Notificaciones</h1>
  {{-- <a class="float-right btn btn-success btn-lg" href="/admin/productos/agregar">Nuevo</a> --}}
  <br>
   {{-- <div class="loader"></div>  --}}
  @include('notifications.datatable')

@endsection

<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
</script>
