
    <!-- Content Header (Page header) -->


    <!-- Main content -->
   <section class="content" style="width:800px;">

     <div class="panel-body">
       <div class="box box-success">
         <div class="box-header with-border">
           <h3 class="box-title">Crear Producto</h3>
         </div>
             @include('errors.errors')
             <form  method="POST" name='editClient'>
               {{ method_field('post') }}
               <div class="box-body">
                 <div class="row">
                   @include('products._fields')
                 </div>
               </div>


               <div class="box-footer">
                 
                 <input class="btn btn-primary" type="submit" value="Agregar cliente" name="submit"/>
               </div>
         </form>
       </div>
     </div>

   </section>
