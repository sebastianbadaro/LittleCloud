<div class="box">
  <div class="box-header">

  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="myTable" class="table table-bordered table-hover display nowrap" style="width:100%">
      <thead>
      <tr>
        @yield('header')
      </tr>
      </thead>
      <tbody>
        @yield('body')
      </tbody>
      <tfoot>
      <tr>
        @yield('header')
      </tr>
      </tfoot>
    </table>

  </div>
  <!-- /.box-body -->
</div>
