<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
@extends('layouts.app')

@section('title')
  Clientes
@endsection


@section('content-header')

    <h1>
      Estadisticas de ventas del mes

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>


@endsection

@section('content')
  <p>

  </p>

    <div class="row">

    @include('dashboards.MonthlyKPI')
    <div class="col-md-12 col-xs-12">
      <!-- DONUT CHART -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Ventas del mes</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body" style="height: 300px">
          <canvas id="currentMonthSales" width="500" height="500"></canvas>
        </div>
        <!-- /.box-body -->
      </div>
    </div>


    @include('dashboards.CurrentMonthSalesAmountByDay')



    <div class="col-md-6 col-xs-12">
      <!-- DONUT CHART -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Articulos vendidos por subcategoria</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <canvas id="categorychart" ></canvas>
        </div>
        <!-- /.box-body -->
      </div>
    </div>

    <div class="col-md-6 col-xs-12">
      <!-- DONUT CHART -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Articulos vendidos por marca</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <canvas id="brandchart" ></canvas>
        </div>
        <!-- /.box-body -->
      </div>
    </div>

  </div>
  <!-- /.box -->



  <script>
  var ctx = document.getElementById("brandchart").getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: {!!json_encode($brands->pluck("name"))!!},
          datasets: [{
              label: '#',
              data: {!!json_encode($brands->pluck("count"))!!},
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
      scales: {
          yAxes: [{
              ticks: {
                  beginAtZero:true,
                  precision: 0
              },
              scaleLabel: {
               display: true,
               labelString: 'Cantidad de articulos vendidos'
              }
          }],
          xAxes: [{
              ticks: {

              },
              scaleLabel: {
               display: true,
               labelString: 'Marca'
              }
          }]
      }


    }
  });
  </script>


  <script>
  var ctx = document.getElementById("categorychart").getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: {!!json_encode($subcategorias->pluck("name"))!!},
          datasets: [{
              label: '#',
              data: {!!json_encode($subcategorias->pluck("count"))!!},
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
      scales: {
          yAxes: [{
              ticks: {
                  beginAtZero:true,
                  precision: 0
              },
              scaleLabel: {
               display: true,
               labelString: 'Cantidad de articulos vendidos'
              }
          }],
          xAxes: [{
              ticks: {

              },
              scaleLabel: {
               display: true,
               labelString: 'Subcategoria'
              }
          }]
      }


    }
  });
  </script>


  <script>
  var ctx = document.getElementById("currentMonthSales").getContext('2d');
  ctx.height = 100;
  var myChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: {!!json_encode($currentMonthSales->pluck("dayofmonth(created_at)"))!!},
          datasets: [{
              label: '# de ventas',
              data: {!!json_encode($currentMonthSales->pluck("count"))!!},

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
                      beginAtZero:true,
                      precision: 0
                  },
                  scaleLabel: {
                   display: true,
                   labelString: 'Cantidad de ventas'
                  }
              }],
              xAxes: [{
                  ticks: {

                  },
                  scaleLabel: {
                   display: true,
                   labelString: 'Día del mes'
                  }
              }]
          }
      }
  });
  </script>



@endsection
