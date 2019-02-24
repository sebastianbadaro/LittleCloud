@extends('layouts.datatable')

@section('header')
  <th>ID</th>
  <th>Descripcion</th>
  <th>Fecha</th>
  <th>Estado</th>

@endsection

@section('body')
  @foreach($notifications as $notification)
      <tr>

        <td>  {{ $notification->id}} </td>
        <td>  {{ $notification->description }} </td>
        <td>  {{ $notification->created_at }} </td>
        @if ($notification->seen)
          <td class="text-center" > <a><b class="fas fa-envelope-open-text"></b></a> </td>
        @else
          <td class="text-center" > <a><b class="fa fa-envelope "></b></a> </td>
        @endif

        {{-- <td class="text-center fancybox" href="{{ route('detail-product', compact('product')) }}"> <a><b class="fa fa-eye "></b></a> </td> --}}

      </tr>
    @endforeach
@endsection
