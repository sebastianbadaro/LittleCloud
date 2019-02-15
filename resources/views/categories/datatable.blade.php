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
  @foreach($categories as $category)
      <tr>
        <td>  {{ $category->id }} </td>
        <td>  {{ $category->name }} </td>
        {{-- aca tengo las dudas --}}
        <td>  {{ $category->products()->count()}} </td>
        <td>  {{ $category->products()->sum('stock')}} </td>
        <td class="text-center">  <a href={!! route('edit-category',compact('category')) !!} ><b class="fa fa-edit "></b></a> </td>
        <td class="text-center fancybox" href="{{ route('detail-category', compact('category')) }}"> <a><b class="fa fa-eye "></b></a> </td>
      </tr>
    @endforeach
@endsection
