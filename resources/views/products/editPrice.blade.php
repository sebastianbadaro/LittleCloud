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
      <form method="POST" name='editPrice'>
        {{ method_field('post') }}
        {{ csrf_field() }}
        <div class="box-body">
          <div class="row">

            <div class="form-group" >
              <label for="brand_id" class="col-sm-1 control-label">Marca: </label>
              <div class="col-sm-11">
                <select class="form-control" name="brand_id" id='brand_id'>
                  <option selected disabled> Seleccione una</option>
                  <option value = "0" >TODAS</option>
                  @foreach ($brands as $brand )
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="percentage" class="col-sm-1 control-label">Aumento: </label>
              <div class="col-sm-11">
                <div class=" input-group">
                  <div class="input-group-addon">
                    <i class="fas fa-percent"></i>
                  </div>
                  <input class="form-control" type="text" name="percentage" id="percentage" value="" placeholder="10"/>
                </div>

              </div>
            </div>

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
