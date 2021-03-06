@extends('layouts.datatable')

@section('header')
  <th>Codigo</th>
  <th>Descripcion</th>
  <th>Categoria</th>
  <th>Subcategoria</th>
  <th>Precio</th>
  <th>Talle</th>
  <th>Marca</th>
  <th>Genero</th>
  <th>Temporada</th>
  <th>Stock disponible</th>
  <th>Vendidos</th>
  <th>Editar</th>
  <th>Detalle</th>
@endsection

@section('body')
  @foreach($products as $product)
      <tr>
        <td> <a >{{ $product->code }}  </a>  </td>
        <td>  {{ str_limit($product->description, $limit = 30, $end = '...') }} </td>
        <td>  {{ $product->category->name }} </td>
        <td>  {{ $product->category->subcategory->name }} </td>
        <td>  ${{ $product->price }} </td>
        <td>  {{ $product->size }} </td>
        <td>  {{ $product->brand->name }} </td>
        <td>  {{ $product->productGender->name }} </td>
        <td>  {{ $product->season->name }} </td>
        <td>  {{ $product->stock }} </td>
        <td>  {{ $product->timesSold() }} </td>
        <td class="text-center fancybox" href="{{ route('edit-product', compact('product')) }}"> <a><b class="fa fa-edit "></b></a> </td>
        <td class="text-center fancybox" href="{{ route('detail-product', compact('product')) }}"> <a><b class="fa fa-eye "></b></a> </td>

      </tr>
    @endforeach
@endsection
