<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Subcategory extends Model
{
  public function categories()
 {
   return $this->hasMany(Category::class, 'subcategory_id');
 }
}
