{{ csrf_field() }}


<div class="form-group" >
  <label for="address" class="col-sm-1 control-label">Cliente: </label>
  <div class="col-sm-11">
    {{-- <input type="date" name="address" id="address" value="{{ old('address',$client->dni)}}" placeholder="17.000.000"/> --}}
    {{-- <select class="form-control" name="gender_id" id='gender_id'>
      <option selected disabled> Seleccione uno</option>

    </select> --}}


    <select class="js-example-basic-single" name="state" id="client_id">
      
      @foreach ($clients as $client )


        <option

          {{-- @if($client->id!=null&&($gender->id == old('client_id', $client->id)))
            selected
          @endif --}}


         value="{{ $client->id }} ">
          {{ $client->lastname  }},   {{ $client->firstname  }} - [{{ $client->DNI  }}]
        </option>
      @endforeach

    </select>
  </div>
</div>
