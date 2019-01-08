@extends('layouts.datatable')

@section('header')
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
@endsection

@section('body')
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
@endsection
