
  <div class="col-md-12 col-xs-12">
    <!-- DONUT CHART -->
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title"># Ventas por día de la semana</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body" style="height: 300px">
        <canvas id="SalesByWeekDay" width="100" height="100"></canvas>
      </div>
      <!-- /.box-body -->
    </div>
  </div>

  <script>
  var ctx = document.getElementById("SalesByWeekDay").getContext('2d');
  ctx.height = 100;
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: {!!json_encode($SalesByWeekDay->pluck("dayname"))!!},
          datasets: [{
              label: '# Ventas',
              data: {!!json_encode($SalesByWeekDay->pluck("count"))!!},

              backgroundColor:
                'rgba(54, 162, 235, 1)'

              ,  borderColor:
                  'black'

                ,
              borderWidth: 1
          }]
      },
      options: {
        responsive: true,
        animation: {
            duration: 2000, // general animation time
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
