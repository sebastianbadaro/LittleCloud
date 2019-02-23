
    <!-- Content Header (Page header) -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Main content -->
   <section class="content" style="width:800px;">

     <div class="panel-body" >
       <div class="box box-success">
         <div class="box-header with-border">
           <h3 class="box-title">Crear Producto</h3>

         </div>
         <div id="erroralert"class="alert alert-warning alert-dismissible hidden">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           <h4><i class="icon fa fa-warning"></i>{{ config('app.name', 'Nubecita') }} dice:</h4>
           <ul id="errorlist">

               {{-- <li class="error">{{ $error }}</li> --}}

           </ul>
         </div>
             <form  id="myform" method="POST" name='createProduct'>
               {{ method_field('post') }}
               <div class="box-body">
                 <div class="row">
                   @include('products._fields')
                 </div>
               </div>


               <div class="box-footer">


                 <button class="btn btn-primary" id="submit"  name="submit">Agregar Producto</button>
               </div>
         </form>
          <h3 id="exito" class="box-title hidden">Producto creado correctamente!</h3>
       </div>
     </div>

   </section>

   <script type="text/javascript">

    $(document).ready(function(){
   $('#submit').on('click', function(e) {

      var action ='/productos/nuevo';
  e.preventDefault();
  var formdata = $('#myform').serialize();
  console.log('this is the form data'+formdata);
  $.ajax({

      url: 'https://reqres.in/api/users',

      success: function(respuesta) {

          console.log(respuesta);

      },

      error: function() {

          console.log("No se ha podido obtener la información");

      }

  });
});
});
   </script>
