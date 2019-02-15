@extends('layouts.datatable')

@section('header')

    <th>ID</th>
    <th>Nombre</th>
    <th># Productos Diferentes</th>
    <th># Productos en Stock</th>
    <th>Editar</th>
    <th>Ver productos</th>


@endsection

@section('body')
  @foreach($brands as $brand)
      <tr>
        <td>  {{ $brand->id }} </td>
        <td>  {{ $brand->name }} </td>
        <td>  {{ $brand->products()->count()}} </td>
        <td>  {{ $brand->products()->sum('stock')}} </td>
        <td class="text-center">  <a href={!! route('edit-brand',compact('brand')) !!} ><b class="fa fa-edit "></b></a> </td>
        <td class="text-center fancybox" href="{{ route('detail-brand', compact('brand')) }}"> <a><b class="fa fa-eye "></b></a> </td>
      </tr>
    @endforeach
@endsection
