{{ csrf_field() }}



<div class="form-group ">
   <label for="name" class="col-sm-2 control-label">Código: </label>
   <div class="col-sm-10">
     <div class=" input-group">
       <div class="input-group-addon">
         <i class="fa fa-barcode"></i>
       </div>
       <input class="form-control" type="text" name="code" id="code" value="{{ old('code',$product->code)}}" placeholder="gu55d8gh"/>
     </div>
   </div>
  </div>

  <div class="form-group ">
     <label for="name" class="col-sm-2 control-label">Precio: </label>
     <div class="col-sm-10">
       <div class=" input-group">
         <div class="input-group-addon">
           <i class="fa fa-money"></i>
         </div>
         <input class="form-control" type="text" name="price" id="price" value="{{ old('price',$product->price)}}" placeholder="335"/>
       </div>
     </div>
    </div>

    <div class="form-group ">
       <label for="name" class="col-sm-2 control-label">Talle: </label>
       <div class="col-sm-10">
         <div class=" input-group">
           <div class="input-group-addon">
             <i class="fa fa-child"></i>
           </div>
           <input class="form-control" type="text" name="size" id="size" value="{{ old('size',$product->size)}}" placeholder="00"/>
         </div>
       </div>
      </div>

      <div class="form-group ">
         <label for="name" class="col-sm-2 control-label">Desc: </label>
         <div class="col-sm-10">
           <div class=" input-group">
             <div class="input-group-addon">
               <i class="fa fa-align-justify"></i>
             </div>
             <input class="form-control" type="text" name="description" id="description" value="{{ old('size',$product->description)}}" placeholder="Remera roja con ositos"/>
           </div>
         </div>
        </div>

        <div class="form-group ">
           <label for="name" class="col-sm-2 control-label">Edad: </label>
           <div class="col-sm-10">
             <div class=" input-group">
               <div class="input-group-addon">
                 <i class="fa fa-align-justify"></i>
               </div>
               <input class="form-control" type="text" name="ageTarget" id="ageTarget" value="{{ old('ageTarget',$product->ageTarget)}}" placeholder="25"/>
             </div>
           </div>
          </div>

          <div class="form-group" >
            <label for="address" class="col-sm-2 control-label">Categoria: </label>
            <div class="col-sm-10">
              {{-- <input type="date" name="address" id="address" value="{{ old('address',$client->dni)}}" placeholder="17.000.000"/> --}}
              <select class="form-control" name="category_id" id='category_id'>
                <option selected disabled> Seleccione uno</option>
                @foreach ($categories as $category )


                  <option

                    @if($product->gender_id!=null&&($category->id == old('category_id', $product->category_id)))
                      selected
                    @endif


                   value="{{ $category->id }} ">
                    {{ $category->name }}
                  </option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group" >
            <label for="address" class="col-sm-2 control-label">Marca: </label>
            <div class="col-sm-10">
              {{-- <input type="date" name="address" id="address" value="{{ old('address',$client->dni)}}" placeholder="17.000.000"/> --}}
              <select class="form-control" name="brand_id" id='brand_id'>
                <option selected disabled> Seleccione uno</option>
                @foreach ($brands as $brand )


                  <option

                    @if($product->brand_id!=null&&($brand->id == old('brand_id', $product->brand_id)))
                      selected
                    @endif


                   value="{{ $brand->id }} ">
                    {{ $brand->name }}
                  </option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group" >
            <label for="address" class="col-sm-2 control-label">Temporada: </label>
            <div class="col-sm-10">
              {{-- <input type="date" name="address" id="address" value="{{ old('address',$client->dni)}}" placeholder="17.000.000"/> --}}
              <select class="form-control" name="season_id" id='season_id'>
                <option selected disabled> Seleccione uno</option>
                @foreach ($seasons as $season )


                  <option

                    @if($product->season_id!=null&&($season->id == old('season_id', $product->season_id)))
                      selected
                    @endif


                   value="{{ $season->id }} ">
                    {{ $season->name }}
                  </option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group" >
            <label for="address" class="col-sm-2 control-label">Genero: </label>
            <div class="col-sm-10">
              {{-- <input type="date" name="address" id="address" value="{{ old('address',$client->dni)}}" placeholder="17.000.000"/> --}}
              <select class="form-control" name="productGender_id" id='productGender_id'>
                <option selected disabled> Seleccione uno</option>
                @foreach ($productgenders as $productgender )


                  <option

                    @if($product->productgender_id!=null&&($productgender->id == old('productGender_id', $product->productgender_id)))
                      selected
                    @endif


                   value="{{ $productgender->id }} ">
                    {{ $productgender->name }}
                  </option>
                @endforeach
              </select>
            </div>
          </div>
