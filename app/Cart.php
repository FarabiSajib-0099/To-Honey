<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
use Illuminate\Support\Facades\DB;
use App\Product;
class Cart extends Model
{
   use SoftDeletes;
   
   function products(){
      return $this->belongsTo(Product::class, 'product_id');
   }

   //   function products(){
   //    return DB::table('carts')->select('carts.*')
   //    ->addSelect('products.*')
   //    ->join('products', 'carts.product_id', '=', 'products.id', 'left')
   //    ->get();
   // }
}
