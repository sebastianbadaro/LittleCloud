<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\DB;

use App\Sale;

class Product extends Model
{
  public function sales()
  {
    return $this->belongsToMany(Sale::class, 'product_sale', 'product_id', 'sale_id');
  }

  public function timesSelled()
  {
      return  DB::table('product_sale')->where('product_id', $this->id)->count();
  }
}
