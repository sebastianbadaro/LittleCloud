@extends('layouts.datatable')

@section('header')

    <th>Nombre</th>
    <th>Apellido</th>
    <th>Email</th>
    <th>Telefono</th>
    <th>DNI</th>
    <th>Direccion</th>
    <th>Cumpleaños</th>
    <th>Genero</th>
    <th># Compras</th>
    <th>Total Gastado</th>
    <th>Editar</th>
    <th>Historial</th>


@endsection

@section('body')
  @foreach($clients as $client)
      <tr >
        <td>  {{ $client->lastname }} </td>
        <td>  {{ $client->firstname }} </td>
        <td>  {{ $client->email }} </td>
        <td>  {{ $client->phone }} </td>
        <td>  {{ $client->DNI }} </td>
        <td>  {{ $client->address }} </td>
        <td>  {{ $client->birthdate }} </td>
        <td>  {{ $client->gender->name }} </td>
        <td>  {{ $client->totalPurchases() }} </td>
        <td>  ${{ $client->totalSpent() }} </td>
        <td class="text-center">  <a href={!! route('edit-client',compact('client')) !!} ><b class="fa fa-edit "></b></a> </td>
        <td class="text-center fancybox" href="{{ route('detail-client', compact('client')) }}"> <a><b class="fa fa-eye "></b></a> </td>
      </tr>
    @endforeach
@endsection
