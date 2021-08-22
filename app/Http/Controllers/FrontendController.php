<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use App\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Product_image;

class FrontendController extends Controller
{
 public function index(){
 
return view('frontend.index',[
   'active_categories'=>Category::all(),
   'active_products'=>Product::latest()->get()
]);

 }

 function productdetails ($slug){

   $product_info= Product::where('slug',$slug)->firstOrFail();
 
  $related_products=Product::where('category_id',$product_info->category_id)->where('id' , '!=' ,  $product_info->id)->get();
 
   return view('frontend.productdetails',[
   
      'product_info'=> $product_info,
      'related_products'=>$related_products,
      'product_images'=>Product_image::where('product_id',$product_info->id)->get()
   ]);
 }


 public function contact(){
    return view('frontend.contact');
     }


     
function contactinsert (Request $request){


   $contact_id=Contact::insertGetId($request->except('_token')+[
      'created_at'=>Carbon::now()
   ]);
   
   if($request->hasFile('contact_attachment')){
      // $uploaded_path=$request->file('contact_attachment')->store('contact_uploads');

      $path = $request->file('contact_attachment')->storeAs(
         'contact_uploads', $contact_id .'.'.$request->file('contact_attachment')->getClientOriginalExtension()
     );
     Contact::find($contact_id )->update([
            'contact_attachment'=>$path
     ]);
   }

   return back()->with('send_msg','Thanks for messaging');

}
function shoppage(){
   return view('frontend.shop',[
      'categories'=>Category::all(),
      'products'=>Product::all()

   ]);
 }

}
