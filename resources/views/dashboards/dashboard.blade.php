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
    <div class="row">

    @include('dashboards.MonthlyKPI')
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
          <canvas id="currentMonthSales" width="50" height="50"></canvas>
        </div>
        <!-- /.box-body -->
      </div>
    </div>


    @include('dashboards.CurrentMonthSalesAmountByDay')



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
          <canvas id="scatterSales" width="100" height="100"></canvas>
        </div>
        <!-- /.box-body -->
      </div>
    </div>

  </div>
  <!-- /.box -->

<script type="text/javascript">
var ctx = document.getElementById("scatterSales").getContext('2d');
var scatterChart = new Chart(ctx, {
  type: 'scatter',
  data: {
      datasets: [{
          label: 'Scatter Dataset',
          data: {!!json_encode($dayweekHour)!!}
      }]
  },
  options: {
    responsive: true,
    animation: {
        duration: 1000, // general animation time
    },
    maintainAspectRatio: false,
      scales: {
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
                      beginAtZero:true
                  }
              }]
          }
      }
  });
  </script>



@endsection
