<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <table id="example2" class="table table-bordered table-hover">
  <thead>
  <tr>
    <th>ID</th>
    <th>Cliente</th>
    <th>Tipo de pago</th>
    <th>Fecha</th>
    <th>Total</th>


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



      </tr>
    @endforeach

  </tbody>
</table>


  </body>
</html>
