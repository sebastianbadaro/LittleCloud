<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
@extends('layouts.app')

@section('title')
  Estadisticas historicas
@endsection


@section('content-header')

    <h1>
      Estadisticas historicas

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
@endsection

@section('content')

@include('dashboards.historic-monthlySales')
@include('dashboards.historic-monthlySalesAmount')
@include('dashboards.historic-SalesByHour')






@endsection
