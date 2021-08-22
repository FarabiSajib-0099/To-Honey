<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
class Product_image extends Model
{
   use SoftDeletes;
   public function product(){

      return $this->belongsToMany('App\Product');
   }
}
