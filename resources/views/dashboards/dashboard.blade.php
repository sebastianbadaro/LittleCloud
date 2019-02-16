<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
@extends('layouts.app')

@section('title')
  Clientes
@endsection


@section('content-header')

    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
@endsection

@section('content')

  <!-- Small boxes (Stat box) -->
  <div class="row">
      <div class="col-md-4 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
              <h3>$ {{$totalValueOfStock}}</h3>

              <p>Valor total de stock</p>
            </div>
            <div class="icon" style="top: 10px;">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>

      </div>
      <!-- ./col -->
      <div class="col-md-4 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{$amountofItemsInStock}}<sup style="font-size: 20px"></sup></h3>

            <p>Cantidad de articulos en stock</p>
          </div>
          <div class="icon" style="top: 10px;">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-md-4 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{$totalAmountOfClients}}</h3>

            <p>Clientes registrados</p>
          </div>
          <div class="icon" style="top: 10px;">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
      <!-- ./col -->


    <div class="row">
      <div class="col-md-4 col-xs-12">
        <!-- DONUT CHART -->
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Stock por Categoria</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <canvas id="categorychart" width="200" height="200"></canvas>
          </div>
          <!-- /.box-body -->
        </div>
      </div>

      <div class="col-md-4 col-xs-12">
        <!-- DONUT CHART -->
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Stock por Marca</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <canvas id="brandChart" width="200" height="200"></canvas>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
    <!-- /.box -->

    <div class="col-md-4 col-xs-12">
      <!-- DONUT CHART -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Clientes por Genero</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <canvas id="genderChart" width="50" height="50"></canvas>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
    <!-- /.box -->

    <div class="col-md-12 col-xs-12">
      <!-- DONUT CHART -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Ventas por tipo de pago</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body" style="height: 300px">
          <canvas id="paymentTypeChart" width="50" height="50"></canvas>
        </div>
        <!-- /.box-body -->
      </div>
    </div>

    <div class="col-md-12 col-xs-12">
      <!-- DONUT CHART -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Ventas del último mes</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body" style="height: 300px">
          <canvas id="lastMonthSales" width="50" height="50"></canvas>
        </div>
        <!-- /.box-body -->
      </div>
    </div>


  </div>
  <!-- /.box -->

  <script>
  var ctx = document.getElementById("brandChart").getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
          labels: {!!json_encode($brands->pluck("name"))!!},
          datasets: [{
              label: '# of Votes',
              data: {!!json_encode($brands->pluck("count"))!!},
              backgroundColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',


              ],

              borderWidth: 1
          }]
      },
      options: {

      }
  });
  </script>
  <script>
  var ctx = document.getElementById("categorychart").getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
          labels: {!!json_encode($categorias->pluck("name"))!!},
          datasets: [{
              label: '# of Votes',
              data: {!!json_encode($categorias->pluck("count"))!!},
              backgroundColor: [
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(255, 99, 132, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',

              ],

              borderWidth: 1
          }]
      },
      options: {

      }
  });
  </script>

  <script>
  var ctx = document.getElementById("genderChart").getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
          labels: {!!json_encode($genders->pluck("name"))!!},
          datasets: [{
              label: '# de clientes',
              data: {!!json_encode($genders->pluck("count"))!!},
              backgroundColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',


              ],

              borderWidth: 1
          }]
      },
      options: {
        circumference: Math.PI,
        rotation: Math.PI
      }
  });
  </script>

  <script>
  var ctx = document.getElementById("paymentTypeChart").getContext('2d');
  ctx.height = 100;
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: {!!json_encode($paymentTypes->pluck("name"))!!},
          datasets: [{
              label: '# de ventas',
              data: {!!json_encode($paymentTypes->pluck("count"))!!},
              backgroundColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',


              ],
              borderColor: [
                  "black",
                  "black",
                  "black",
                  "black",
                  "black",

              ],
              borderWidth: 1
          }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }]
          }
      }
  });
  </script>


  <script>
  var ctx = document.getElementById("lastMonthSales").getContext('2d');
  ctx.height = 100;
  var myChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: {!!json_encode($lastMonthSales->pluck("dayofmonth(created_at)"))!!},
          datasets: [{
              label: '# de ventas',
              data: {!!json_encode($lastMonthSales->pluck("count"))!!},

              backgroundColor: [
                'rgba(54, 162, 235, 1)'

              ],  borderColor: [
                  'black'

                ],
              borderWidth: 1
          }]
      },
      options: {
        responsive: true,
        animation: {
            duration: 1000, // general animation time
        },
        maintainAspectRatio: false,
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }]
          }
      }
  });
  </script>



@endsection
