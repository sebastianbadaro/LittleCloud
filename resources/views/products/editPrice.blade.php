@extends('layouts.app')

@section('title')
  Editar precio general en %
@endsection



@section('content')
  <div class="panel-body">
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Editar precio general en %</h3>
      </div>
          @include('errors.errors')
          <form  method="POST" name='editPrice'>
            {{ method_field('put') }}
            <div class="box-body">
              <div class="row">

              </div>
            </div>


            <div class="box-footer">
              <a class="btn btn-danger" href="{{ URL::previous()}}">Volver</a>
              <input class="btn btn-primary" type="submit" value="Editar precio" name="submit"/>
            </div>
      </form>
    </div>
  </div>

@endsection
