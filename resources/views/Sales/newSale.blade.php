@extends('layouts.app')

@section('title')
  Nueva venta
@endsection



@section('content')
  <div class="panel-body">
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Nueva venta</h3>
      </div>
          @include('errors.errors')
          <form  method="POST" name='editClient'>
            {{ method_field('post') }}
            <div class="box-body">
              <div class="row">
                 @include('Sales._fields')
              </div>
            </div>



            <div class="box-footer">

              <input class="btn btn-primary" type="submit" value="Vender" name="submit"/>
            </div>
      </form>
    </div>
  </div>

@endsection
