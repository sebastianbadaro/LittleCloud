@extends('layouts.app')

@section('title')
  Editar marca
@endsection



@section('content')
  <div class="panel-body">
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Editar marca</h3>
      </div>
          @include('errors.errors')
          <form  method="POST" name='editBrand'>
            {{ method_field('put') }}
            <div class="box-body">
              <div class="row">
                @include('brands._fields')
              </div>
            </div>


            <div class="box-footer">
              <a class="btn btn-danger" href="{{ URL::previous()}}">Volver</a>
              <input class="btn btn-primary" type="submit" value="Editar marca" name="submit"/>
            </div>
      </form>
    </div>
  </div>

@endsection
