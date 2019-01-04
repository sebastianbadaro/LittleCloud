<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

use App\Sale;

class Product extends Model
{
  public function sales()
  {
    return $this->belongsToMany(Sale::class);
  }
}
