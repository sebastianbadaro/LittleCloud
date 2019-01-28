
@extends('layouts.app')

@section('title')
  Agregar Stock
@endsection


@section('content')

  <h1>Agregar Stock</h1>
  {{-- <a class="float-right btn btn-success btn-lg" href="/admin/productos/agregar">Nuevo</a> --}}
  <br>
  <div class="box">
    <div class="box-header">

    </div>
    <!-- /.box-header -->
    <div class="box-body">

      <div class="row">
        <div class="form-group">
          <label for="name" class="col-sm-1 control-label">Codigo: </label>
          <div class="col-sm-4">
            <div class=" input-group">
              <div class="input-group-addon">
                <i class="fa fa-barcode"></i>
              </div>
              <input id="code" class="form-control" type="text" name="lastname" id="lastname" value="" placeholder="Escanear codigo..."/>
            </div>

          </div>
          <div class="col-sm-6">
            <button type="button" onclick="llamada()" class="btn btn-success"name="button">Agregar al stock</button>
            {{-- <a class="fancybox" id="newProduct" href="{{ route('new-product') }}">nuevo producto</a> --}}
          </div>
        </div>
      </div>
      <table id="" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Code</th>
          <th>Description</th>
          <th>Disponible</th>
        </tr>
        </thead>
        <tbody>

        </tbody>

      </table>

    </div>
    <!-- /.box-body -->
  </div>


@endsection

<script type="text/javascript">





    var agregarlog = function (data) {
      // var res = jQuery.parseJSON(data)
      var res = JSON.parse(data)
      console.log(res);
      // $('tbody').empty()

          $('tbody').prepend('<tr>')
          $('tbody').prepend('<td>'+res.stock+'</td>')
          $('tbody').prepend('<td>'+res.description+'</td>')
          $('tbody').prepend('<td><a class="fancybox" href="/productos/'+res.id+'">'+res.code+'</a></td>')
          $('tbody').prepend('</tr>')


        	$(".fancybox").fancybox({
        		maxWidth	: 1600,
        		maxHeight	: 300,
        		fitToView	: false,
        		width		: '80%',
        		height		: '50%',
        		autoSize	: false,
        		closeClick	: false,
        		openEffect	: 'none',
        		closeEffect	: 'none',
            type: 'ajax'
        	});

    }





   var llamada = function() {
    var codigo = $('#code').val();
    //console.log('lala:'+codigo);
    $.ajax({
      url:'/productos/api/'+codigo,

      success:function(data){
        //console.log(data);
          agregarlog(data)
          $('#code').val("");
      },
      error:function(){
        if (confirm('El codigo '+codigo+' no pertenece a un producto. ¿Quiere crear uno nuevo?')) {
            $('#newProduct').click();
        } else {
          $('#code').val("");
        };

      }


    })
    // setTimeout(llamada,2000)
  }
  //llamada()




</script>
