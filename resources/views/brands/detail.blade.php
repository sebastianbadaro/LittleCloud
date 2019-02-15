
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Productos de la marca {{$brand->name}}
      </h1>
    </section>

    <!-- Main content -->
   <section class="content">

     <div class="box">
       <div class="box-header">

       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <table id="myTable" class="table table-bordered table-hover display nowrap" style="width:100%">
           <thead>
           <tr>
             <th>Código</th>
             <th>Descrip.</th>
             <th>Precio</th>
             <th>Talle</th>
             <th>Stock</th>
             <th>Precio X Stock</th>
           </tr>
           </thead>
           <tbody>
             @foreach ($products as $product)
               <tr>
                 <td>{{$product->id}} </td>
                 <td>{{$product->description}} </td>
                 <td>${{$product->price}} </td>
                 <td>{{$product->size}}</td>
                 <td>{{$product->stock}}</td>
                 <td>${{$product->price * $product->stock}}</td>

               </tr>
             @endforeach
           </tbody>
           <tfoot>
           <tr>
             <th>Código</th>
             <th>Descrip.</th>
             <th>Precio</th>
             <th>Talle</th>
             <th>Stock</th>
             <th>Precio X Stock</th>
           </tr>
           </tfoot>
         </table>

       </div>
       <!-- /.box-body -->
     </div>



   </section>
