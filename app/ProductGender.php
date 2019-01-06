<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
class ProductGender extends Model
{
  protected $table = "productgenders";
  public function products()
 {
     return $this->hasMany(Product::class, 'brand_id');
 }
}
