<div class="col-md-12 col-xs-12">
  <!-- DONUT CHART -->
  <div class="box box-danger">
    <div class="box-header with-border">
      <h3 class="box-title">Ventas en AR$ del mes</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body" style="height: 300px">
      <canvas id="currentmonthSalesAmountByDay" width="50" height="50"></canvas>
    </div>
    <!-- /.box-body -->
  </div>
</div>

<script>
var ctx = document.getElementById("currentmonthSalesAmountByDay").getContext('2d');
ctx.height = 100;
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: {!!json_encode($currentmonthSalesAmountByDay->pluck("dayofmonth(created_at)"))!!},
        datasets: [{
            label: 'ventas en AR$',
            data: {!!json_encode($currentmonthSalesAmountByDay->pluck("amountSold"))!!},

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
               labelString: 'Cantidad de ventas en AR$'
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
