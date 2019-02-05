
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Venta
        <small>#{{$sale->id}}</small>
      </h1>
    </section>

    <!-- Main content -->
   <section class="content">

       <div class="row">
         <div class="col">

           <!-- Profile Image -->
           <div class="box box-primary">
             <div class="box-body box-profile">




                <ul class="list-group list-group-unbordered">
                 <li class="list-group-item">
                   <b>Cliente:</b> <a class="pull-right">{{$sale->client->lastname}},   {{$sale->client->firstname}} </a>
                  </li>
                 <li class="list-group-item">
                   <b>Tipo de pago: </b> <a class="pull-right">{{$sale->paymenttype->name}}</a>
                 </li>

                 <li class="list-group-item">



                   <b>Fecha: </b> <a class="pull-right">{{$sale->created_at}}</a>
                 </li>

                 <li class="list-group-item">
                 <table>
                   <thead>
                     <tr>
                       <th>Codigo</th>
                       <th>Descripcion</th>
                       <th>Cantidad</th>
                       <th>Monto</th>
                     </tr>
                   </thead>

                   <tbody>
                    @foreach ($sale->products as $product)
                      <tr>
                        <td>{{$product->code}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->pivot->amount}}</td>
                        <td>${{$product->pivot->price}}</td>
                      </tr>
                    @endforeach

                   </tbody>
                 </table>
                 </li>
                 <li class="list-group-item">
                   <b>Total</b> <a class="pull-right">${{$sale->totalAmount()}}</a>
                 </li>
                 {{--
                 <li class="list-group-item">
                   <b>Temporada</b> <a class="pull-right">{{$product->season->name}}</a>
                 </li>
                 <li class="list-group-item">
                   <b>Genero</b> <a class="pull-right">{{$product->productgender->name}}</a>
                 </li> --}}

               </ul>


             <!-- /.box-body -->
           </div>
         </div>
       </div>
   </section>
 {{--
   @if ($client->orders)
     <div class="pad margin no-print">
       <div class="callout callout-danger" style="margin-bottom: 0!important; color:white">
         <h4><i class="glyphicon glyphicon-info-sign"></i> Info:</h4>
         El cliente tiene los siguientes pedidos:
         <ul>
           @foreach ($client->orders as $order)
             <li>#{{$order->id}}, de ${{$order->total_price}} en la tienda {{$order->store->name}}</li>
           @endforeach
         </ul>
       </div>
     </div>
   @endif --}}
    <!-- /.content -->
