@extends('layouts.app')

@section('title')
  Nuevo Cliente
@endsection



@section('content')
  <div class="panel-body">
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Crear cliente</h3>
      </div>
          @include('errors.errors')
          <form  method="POST" name='editClient'>
            {{ method_field('post') }}
            <div class="box-body">
              <div class="row">
                @include('clients._fields')
              </div>
            </div>


            <div class="box-footer">
              <a class="btn btn-danger" href="{{ URL::previous()}}">Volver</a>
              <input class="btn btn-primary" type="submit" value="Agregar cliente" name="submit"/>
            </div>
      </form>
    </div>
  </div>

@endsection
