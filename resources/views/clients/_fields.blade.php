{{ csrf_field() }}



<div class="form-group ">
   <label for="name" class="col-sm-1 control-label">Nombre: </label>
   <div class="col-sm-11">
     <div class=" input-group">
       <div class="input-group-addon">
         <i class="fa fa-user"></i>
       </div>
       <input class="form-control" type="text" name="firstname" id="firstname" value="{{ old('firstname',$client->firstname)}}" placeholder="Graciela"/>
     </div>
   </div>
  </div>

<div class="form-group">
  <label for="name" class="col-sm-1 control-label">Apellido: </label>
  <div class="col-sm-11">
    <div class=" input-group">
      <div class="input-group-addon">
        <i class="fa fa-user"></i>
      </div>
      <input class="form-control" type="text" name="lastname" id="lastname" value="{{ old('lastname',$client->lastname)}}" placeholder="Femenia"/>
    </div>

  </div>
</div>
<div class="form-group">
  <label for="phone" class="col-sm-1 control-label">Teléfono: </label>
  <div class="col-sm-11">
    <div class=" input-group">
      <div class="input-group-addon">
        <i class="fa fa-phone"></i>
      </div>
      <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone',$client->phone)}}" placeholder="Por ej. 221 543 3445"/>
    </div>

  </div>
</div>
<div class="form-group">
  <label for="address" class="col-sm-1 control-label">Dirección: </label>
  <div class="col-sm-11">
    <div class=" input-group">
      <div class="input-group-addon">
        <i class="fa fa-home"></i>
      </div>
      <input class="form-control" type="text" name="address" id="address" value="{{ old('address',$client->address)}}" placeholder="J.M Uriburu 341"/>
    </div>

  </div>
</div>
<div class="form-group">
  <label for="address" class="col-sm-1 control-label">Email: </label>
  <div class="col-sm-11">
    <div class=" input-group">
      <div class="input-group-addon">
        <i class="fa fa-envelope"></i>
      </div>
      <input class="form-control" type="text" name="email" id="email" value="{{ old('email',$client->email)}}" placeholder="ejemplo@ejemplo.com"/>
    </div>

  </div>
</div>
<div class="form-group">
  <label for="address" class="col-sm-1 control-label">DNI: </label>
  <div class="col-sm-11">
    <div class=" input-group">
      <div class="input-group-addon">
        <i class="fa fa-id-card"></i>
      </div>
      <input class="form-control" type="text" name="dni" id="dni" value="{{ old('dni',$client->DNI)}}" placeholder="17.000.000"/>
    </div>

  </div>
</div>
<div class="form-group">
  <label for="address" class="col-sm-1 control-label">Fecha Nac.: </label>
  <div class="col-sm-11">
  <div class=" input-group">
    <div class="input-group-addon">
      <i class="fa fa-birthday-cake"></i>
    </div>
    <input type="date" class="form-control" name="birthdate" id="birthdate" data-mask="" value="{{ old('birthdate',$client->birthdate)}}" data-inputmask="'alias': 'dd/mm/yyyy'" >
  </div>
  </div>


</div>
<div class="form-group" >
  <label for="address" class="col-sm-1 control-label">Genero: </label>
  <div class="col-sm-11">
    {{-- <input type="date" name="address" id="address" value="{{ old('address',$client->dni)}}" placeholder="17.000.000"/> --}}
    <select class="form-control" name="gender_id" id='gender_id'>
      <option selected disabled> Seleccione uno</option>
      @foreach ($genders as $gender )


        <option

          @if($client->gender_id!=null&&($gender->id == old('gender_id', $client->gender_id)))
            selected
          @endif


         value="{{ $gender->id }} ">
          {{ $gender->name }}
        </option>
      @endforeach
    </select>
  </div>
</div>
