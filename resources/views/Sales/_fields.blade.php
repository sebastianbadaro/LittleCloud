{{ csrf_field() }}


<div class="form-group col-sm-12" >
  <label for="address" class="col-sm-1 control-label">Cliente: </label>
  <div class="col-sm-4">
    {{-- <input type="date" name="address" id="address" value="{{ old('address',$client->dni)}}" placeholder="17.000.000"/> --}}
    {{-- <select class="form-control" name="gender_id" id='gender_id'>
      <option selected disabled> Seleccione uno</option>

    </select> --}}


    <select class="js-example-basic-single form-control" name="client_id" id="client_id">

      @foreach ($clients as $client )


        <option

          {{-- @if($client->id!=null&&($gender->id == old('client_id', $client->id)))
            selected
          @endif --}}


         value="{{ $client->id }} ">
          {{ $client->lastname  }},   {{ $client->firstname  }} - [{{ $client->DNI  }}]
        </option>
      @endforeach

    </select>

  </div>
  </div>
  <div class="form-group col-sm-12" >
    <label for="address" class="col-sm-1 control-label">Tipo de pago: </label>
    <div class="col-sm-4">
      {{-- <input type="date" name="address" id="address" value="{{ old('address',$client->dni)}}" placeholder="17.000.000"/> --}}
      {{-- <select class="form-control" name="gender_id" id='gender_id'>
        <option selected disabled> Seleccione uno</option>

      </select> --}}


      <select class="form-control" name="paymenttype_id" id="paymenttype_id">

        @foreach ($paymentTypes as $paymentType )


          <option

            {{-- @if($client->id!=null&&($gender->id == old('client_id', $client->id)))
              selected
            @endif --}}


           value="{{ $paymentType->id }}">
            {{ $paymentType->name  }}
          </option>
        @endforeach

      </select>

    </div>
    </div>
  <div class="form-group col-sm-12">

      <label for="name" class="col-sm-1 control-label">Codigo: </label>
      <div class="col-sm-4">
        <div class=" input-group">
          <div class="input-group-addon">
            <i class="fa fa-barcode"></i>
          </div>
          <input id="code" class="form-control" type="text" name="code" id="code" value="" placeholder="Escanear codigo..."/>
        </div>

      </div>
      <div class="col-sm-6">
        <button type="button" onclick="llamada()" class="btn btn-success"name="button">Agregar</button>

      </div>

  </div>
  <div class="">
    <table id="" class="table table-bordered table-hover">
      <thead>
      <tr>
        <th>Codigo</th>
        <th>Descripcion</th>
        <th>Talle</th>
        <th>Precio</th>
        <th class="text-center" >Borrar</th>
      </tr>
      </thead>
      <tbody>

      </tbody>

    </table>
  </div>



<div class="pull-right" >
    <label for="name" class="col-sm-2 control-label">Total: </label>
    <div class="col-sm-10">
      <div class=" input-group">

        <input id="total" disabled class="form-control" type="text" name="lastname" id="lastname" value="" placeholder="$0"/>
      </div>
    </div>

</div>
<select class="selector" hidden multiple id="products[]" name="products[]" name="products[]">

</select>
<script type="text/javascript">

var total=0;
var index=0;



var agregarlog = function (data) {
  // var res = jQuery.parseJSON(data)
  var res = JSON.parse(data)
  console.log(res);
  // $('tbody').empty()
      index=index+1;

      $('tbody').prepend('<tr id="product'+index+'" data-id="'+res.id+'" class="sellingProduct">')
      $('#product'+index).prepend('<td class="text-center">  <button onclick="deleteLine('+index+','+res.price+')"class="btn btn-danger"type="button" name="button"><i class="fa fa-trash"></i></button></td>')
      $('#product'+index).prepend('<td>'+res.price+'</td>')
      $('#product'+index).prepend('<td>'+res.size+'</td>')
      $('#product'+index).prepend('<td>'+res.description+'</td>')
      $('#product'+index).prepend('<td><a class="fancybox" href="/productos/'+res.id+'">'+res.code+'</a></td>')

      total=total+res.price;
      $('#total').val("$"+total.toFixed(2));

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

var deleteLine = function(index,price){

  $('#product'+index).remove();
  total=total-price;
  $('#total').val("$"+total.toFixed(2));
}


var llamada = function() {
 var codigo = $('#code').val();
 codigo = codigo.replace("%", "%25"); //para escapar los codigos con %
 $.ajax({
   url:'/productos/api/'+codigo,

   success:function(data){
        console.log(data);
       agregarlog(data)
       $('#code').val("");
   },
   error:function(){
     if (confirm('El codigo '+codigo+' no pertenece a un producto. ¿Quiere crear uno nuevo?')) {

     } else {
       $('#code').val("");
     };

   }


 })
 // setTimeout(llamada,2000)
}
function selectGenerate(e) {
  console.log("select generate");

   if(total>0){
       var products = document.querySelectorAll('.sellingProduct');
       console.log(products);
     for(product of products){
         var idProducto = product.getAttribute('data-id');
         console.log(idProducto);
         var counter= document.querySelector('.count_'+idProducto);
        if (counter) {
           counter.setAttribute('value',parseInt(counter.getAttribute('value'))+1) ;
        }
        else {

          var inputProduct = document.createElement('option');
          var inputNumber = document.createElement('input');
          inputProduct.setAttribute('type','hidden');
          inputNumber.setAttribute('type','hidden number');
          inputNumber.setAttribute('name','count_'+idProducto);
          inputNumber.setAttribute('class','count_'+idProducto);
          inputNumber.setAttribute('value',1);
          inputProduct.setAttribute('class','productInputSelected');
          inputProduct.setAttribute('selected','true');
          inputProduct.setAttribute('value',idProducto);
          document.getElementsByClassName('selector')[0].appendChild(inputProduct)
          document.getElementsByClassName('selector')[0].appendChild(inputNumber)
        }

       }
   }else {
    e.preventDefault();
   }
}
window.onload = function () {
      console.log("hola estoy cargando");
      console.log($('#newSaleForm'));
      $('#newSaleForm').bind('submit',selectGenerate);
      $("#newSaleForm").bind("keypress", function (e) {
        console.log(e.keyCode);
          if (e.keyCode == 13 || e.keyCode == 9) {
              llamada();
              e.preventDefault();
          }
      });
}

</script>
