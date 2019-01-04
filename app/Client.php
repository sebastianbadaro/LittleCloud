<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;
use App\Gender;
use App\Sale;
class Client extends Model
{
  public function gender()
  {
      return $this->belongsTo(Gender::class,'gender_id');
  }

  public function sales()
 {
    return $this->hasMany(Sale::class, 'client_id');
 }

 public function totalPurchases(){
   return  Sale::where('client_id', '=', $this->id)->count();
 }

 public function totalSpent()
 {
   $mySales = $this->sales()->pluck('id')->toArray();
     return  DB::table('product_sale')->whereIn('sale_id', $mySales)->sum(DB::raw('amount * price'));
 }
}
