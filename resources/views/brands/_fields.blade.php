{{ csrf_field() }}



<div class="form-group ">
   <label for="name" class="col-sm-1 control-label">Nombre: </label>
   <div class="col-sm-11">
     <div class=" input-group">
       <div class="input-group-addon">
         <i class="fa fa-plus"></i>
       </div>
       <input class="form-control" type="text" name="name" id="name" value="{{ old('name',$brand->name)}}" placeholder="Nike"/>
     </div>
   </div>
  </div>
