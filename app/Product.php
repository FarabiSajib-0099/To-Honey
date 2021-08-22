<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use SoftDeletes;
    protected $guarded=[];

    function relationwithcattable(){
        return $this->hasOne('App\Category','id','category_id')->withTrashed();
    }

    function relationwithproductimagetable(){
        return $this->hasMany('App\Product_image','id','product_id')->withTrashed();
    }
}
