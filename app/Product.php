<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\DB;

use App\Sale;
use App\Brand;
use App\Category;
use App\ProductGender;

class Product extends Model
{
  public function sales()
  {
    return $this->belongsToMany(Sale::class, 'product_sale', 'product_id', 'sale_id');
  }

  public function timesSold()
  {
      return  DB::table('product_sale')->where('product_id', $this->id)->count();
  }

  public function brand()
  {
      return $this->belongsTo(Brand::class,'brand_id');
  }

  public function category()
  {
      return $this->belongsTo(Category::class,'category_id');
  }

  public function productGender()
  {
      return $this->belongsTo(ProductGender::class,'productGender_id');
  }

  public function season()
  {
      return $this->belongsTo(Season::class,'season_id');
  }

}
