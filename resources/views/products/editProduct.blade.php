
    <!-- Content Header (Page header) -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Main content -->
   <section class="content" style="width:800px;">

     <div class="panel-body" >
       <div class="box box-success">
         <div class="box-header with-border">
           <h3 class="box-title">Editar Producto</h3>

         </div>
         <div id="erroralert"class="alert alert-warning alert-dismissible hidden">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           <h4><i class="icon fa fa-warning"></i>{{ config('app.name', 'Nubecita') }} dice:</h4>
           <ul id="errorlist">

               {{-- <li class="error">{{ $error }}</li> --}}

           </ul>
         </div>
             <form  id="myform" method="put" name='createProduct'>
               {{ method_field('put') }}
               <div class="box-body">
                 <div class="row">
                   @include('products._fields')
                 </div>
               </div>


               <div class="box-footer">


                 <button class="btn btn-primary" id="submit"  name="submit">Editar Producto</button>
               </div>
         </form>
          <h3 id="exito" class="box-title hidden">Producto editado correctamente!</h3>
       </div>
     </div>

   </section>

   <script type="text/javascript">

    $(document).ready(function(){
   $('#submit').on('click', function(e) {
      var productId ={!!$product->id!!}
      var action ='/productos/'+productId+'/editar';
  e.preventDefault();
  var formdata = $('#myform').serialize();
  console.log('this is the form data'+formdata);
  $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'PUT',
      url: action,
      data: formdata,
      dataType: 'JSON',
      success: function(msg) {
        console.log('succ');
        console.log(msg);
        $('#exito').removeClass("hidden");
        $('#myform').addClass("hidden");
        $('#erroralert').addClass("hidden");
      },
        error: function (msg) {
          $('#errorlist').empty() ;
          $('#erroralert').removeClass("hidden");
           console.log(msg.responseJSON.errors);
           console.log(msg);
          var errors = Object.keys(msg.responseJSON.errors).map(function(key) {
            return [  msg.responseJSON.errors[key]][0][0];
            });
            console.log(errors);
          errors.forEach(function(element) {
              console.log(element);
              var erroritem = document.createElement("li");
              // erroritem.addClass("error");
              erroritem.innerHTML = element;
              $('#errorlist').append(erroritem);
            });


            console.log(msg.responseJSON.errors);
        }
  });
});
});
   </script>
