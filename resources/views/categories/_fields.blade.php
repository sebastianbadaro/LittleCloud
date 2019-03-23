{{ csrf_field() }}



<div class="form-group ">
   <label for="name" class="col-sm-2   control-label">Nombre: </label>
   <div class="col-sm-10">
     <div class=" input-group">
       <div class="input-group-addon">
         <i class="fa fa-plus"></i>
       </div>
       <input class="form-control" type="text" name="name" id="name" value="{{ old('name',$category->name)}}" placeholder="Camisas"/>
     </div>
   </div>
  </div>

  <div class="form-group" >
    <label for="subcategory_id" class="col-sm-2 control-label">SubCategoria: </label>
    <div class="col-sm-10">
      {{-- <input type="date" name="address" id="address" value="{{ old('address',$client->dni)}}" placeholder="17.000.000"/> --}}
      <select class="form-control" name="subcategory_id" id='subcategory_id'>
        <option selected disabled> Seleccione uno</option>
        @foreach ($subcategories as $subcategory )


          <option

            @if($category->subcategory_id!=null&&($subcategory->id == old('subcategory_id', $category->subcategory_id)))
              selected
            @endif


           value="{{ $subcategory->id }} ">
            {{ $subcategory->name }}
          </option>
        @endforeach
      </select>
    </div>
  </div>
