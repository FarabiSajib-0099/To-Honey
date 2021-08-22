<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Category extends Model
{
    use SoftDeletes;
    protected $fillable=['cat_name','cat_des','category_photo'];

    function relationwithproducttable(){
        return $this->hasMany('App\Product','category_id','id')->withTrashed();
    }
}
