<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Gender;
class Client extends Model
{
  public function gender()
  {
      return $this->belongsTo(Gender::class,'gender_id');
  }
}
