<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Products;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
class CartController extends Controller
{
    public function store(Request $request){

    if(Cookie::get('g_cart_id')){
       $generated_cart_id=Cookie::get('g_cart_id');

    }else{
        $generated_cart_id= Str::random(7).rand(1,1000);
 
       Cookie::queue('g_cart_id',$generated_cart_id,1440);
    }
if(Cart::where('generated_cart_id',$generated_cart_id)->where('product_id',$request->product_id)->exists()){

    Cart::where('generated_cart_id',$generated_cart_id)->where('product_id',$request->product_id)->increment('product_quantity',$request->product_quantity);
}
else{
     Cart::insert([
        'generated_cart_id'=>$generated_cart_id,
        'product_id'=>$request->product_id,
        'product_quantity'=>$request->product_quantity,
        'created_at'=>Carbon::now()
    ]);
}
   return back();
   
    }



    function index(){
       
        return view('frontend.cart');
    }
}
