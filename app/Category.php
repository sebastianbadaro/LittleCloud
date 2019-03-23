<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Subcategory;

class Category extends Model
{

  protected $fillable = ['name','subcategory_id'];

  public function products()
 {
     return $this->hasMany(Product::class, 'category_id');
 }

 public function subcategory(){
   return $this->belongsTo(Subcategory::class, 'subcategory_id');
 }
}
