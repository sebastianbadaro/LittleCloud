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
    <th>Codigo</th>
    <th>Descripcion</th>
    <th>Precio</th>
    <th>Talle</th>
    <th>Stock disponible</th>


  </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
        <tr>
          <td>  {{ $product->code }} </td>
          <td>  {{ $product->description }} </td>
          <td>  ${{ $product->price }} </td>
          <td>  {{ $product->size }} </td>
          <td>  {{ $product->stock }} </td>
          <td>  {{ $product->timesSelled() }} </td>

        </tr>
      @endforeach

  </tbody>
</table>


  </body>
</html>
