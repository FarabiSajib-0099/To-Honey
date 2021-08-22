<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Carbon\Carbon;
use Illuminate\Support\Str; 
use Image;
use App\Product_image;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.products.index',[
           'active_categories'=>Category::all(),
           'products'=>Product::all()

       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

     $slug_link=Str::slug($request->product_name.'-'.Str::random(7));
          $product_id=Product::insertGetId( $request->except('_token','product_thumbnail_photo','product_multiple_photo')+[
         'slug'=>$slug_link,
         'created_at'=>Carbon::now()
     ]);

     if($request->hasFile('product_thumbnail_photo')){
        //Uploads photo of product_thumbnail_photo start here
        $upload_photo=$request->file('product_thumbnail_photo');
         
        $new_photo_name=$product_id.'.'.$upload_photo->getClientOriginalExtension();
        $new_photo_location='public/uploads/productphotos/'. $new_photo_name;
        Image::make($upload_photo)->save(base_path($new_photo_location),50);
      
        Product::find( $product_id )->update([
          'product_thumbnail_photo'=>$new_photo_name
      
        ]);
     
      }
   //Uploads photo of product_thumbnail_photo end here
   
   
   //Uploads photo of product_thumbnail_photo start here
   if($request->hasFile('product_multiple_photo')){
       $flag=1;
    foreach ($request->file('product_multiple_photo') as $single_photo) {
    
     $upload_photo=$single_photo;
 
    $new_photo_name=$product_id.'-'.$flag.'.'.$upload_photo->getClientOriginalExtension();
    $new_photo_location='public/uploads/product_multiple_photo/'. $new_photo_name;
    Image::make($upload_photo)->save(base_path($new_photo_location),50);
    Product_image::insert([
        'product_id'=>$product_id,
        'product_multiple_image_name'=>$new_photo_name,
        'created_at'=>Carbon::now()

    ]);
 
    $flag ++;
    }
 //Uploads photo of product_thumbnail_photo end here
}

    return back()->with('product_status','Your Product Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Product $product)
    {
        return view('admin.products.edit',[
            'active_categories'=>Category::all(),
            'product_info'=> $product,
           
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

      $product->update($request->except('_token','_method'));
      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
       $product->delete();
       return back();
    }
}
