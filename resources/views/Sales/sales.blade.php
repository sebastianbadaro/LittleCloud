<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <table id="example2" class="">
  <thead>
  <tr>
    <th>ID</th>
    <th>Cliente</th>
    <th>Tipo de pago</th>
    <th>Fecha</th>
    <th>Total</th>
    <th>Detalle</th>


  </tr>
  </thead>
  <tbody>
    @foreach($sales as $sale)
      <tr>
        <td>  {{ $sale->id }} </td>
        <td>  {{ $sale->client->lastname }} {{ $sale->client->firstname }} </td>
        <td>  {{ $sale->paymenttype->name }} </td>
        <td>  {{ $sale->created_at }} </td>
        <td>  ${{ $sale->totalAmount() }} </td>
        <td>
              <table>
                <thead>
                  <tr>
                    <th>Codigo</th>
                    <th>Descripcion</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                  @foreach ($sale->products as $product)
                    <td>  {{ $product->code }} </td>
                    <td>  {{ $product->description }} </td>
                    <td>  {{ $product->pivot->amount }} </td>
                    <td>  ${{ $product->pivot->price }} </td>
                    </tr>
                  @endforeach
                </tbody>

              </table>
         </td>



      </tr>
    @endforeach

  </tbody>
</table>


  </body>
</html>
