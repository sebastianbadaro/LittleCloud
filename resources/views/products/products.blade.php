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
    <th>Categoria</th>
    <th>Precio</th>
    <th>Talle</th>
    <th>Marca</th>
    <th>Genero</th>
    <th>Temporada</th>
    <th>Stock disponible</th>
    <th>Vendidos</th>


  </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
        <tr>
          <td>  {{ $product->code }} </td>
          <td>  {{ str_limit($product->description, $limit = 30, $end = '...') }} </td>
          <td>  {{ $product->category->name }} </td>
          <td>  ${{ $product->price }} </td>
          <td>  {{ $product->size }} </td>
          <td>  {{ $product->brand->name }} </td>
          <td>  {{ $product->productGender->name }} </td>
          <td>  {{ $product->season->name }} </td>
          <td>  {{ $product->stock }} </td>
          <td>  {{ $product->timesSold() }} </td>

        </tr>
      @endforeach

  </tbody>
</table>


  </body>
</html>
