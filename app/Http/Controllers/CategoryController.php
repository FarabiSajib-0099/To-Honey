<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CategoryForm;
use App\Category;
use App\Product;
use Auth;
use Image;
use App\Rules\FindOutNumberRules;
use Carbon\Carbon;
class CategoryController extends Controller
{
  public function addcategory(){
      return view('admin/category/index',[
      'categories'=>Category::all(),
      'delete_categories'=>Category::onlyTrashed()->get()

      ]);
  }

  public function addcategorypost(Request $request){

    $request->validate([
      'cat_name'=>['required','unique:categories,cat_name',new FindOutNumberRules ],
    
      'cat_des'=>'required',
    ],[
      'cat_name.required'=>'Category name koy?',
      'cat_des.required'=>'Category Filed a kichu nai'
    ]);

  
 $category_id=Category::insertGetId([

  'cat_name'=>$request->cat_name,
  'cat_des'=>$request->cat_des,
  'user_id'=>Auth::id(),
  'created_at'=>Carbon::now()
]);
if($request->hasFile('category_photo')){
  echo $category_id ;
  //Uploads photo of category start here
  $upload_photo=$request->file('category_photo');
   
  $new_photo_name=$category_id.'.'.$upload_photo->getClientOriginalExtension();
  $new_photo_location='public/uploads/categroypic/'. $new_photo_name;
  Image::make($upload_photo)->save(base_path($new_photo_location),50);

  Category::find( $category_id )->update([
    'category_photo'=>$new_photo_name

  ]);
  return back();
    //Uploads photo of category end here
}

return back()->with('msg',$request->cat_name.' Category added success');
}
public function deletecategory($category_id){

  //Category Delete
  Category::find($category_id)->delete();
  //Product Delete
  Product::where('category_id',$category_id)->delete();

  return back()->with('delete_status','Your Category Delete Success');
}

public function editcategroy($category_id){

  return view('admin/category/edit',[
    'update_info'=>Category::find($category_id)
  ]);
}


public function editcategroypost(Request $request){
$request->validate([
  'cat_name'=>'unique:categories,cat_name,'.$request->cat_id,

'cat_des'=>'unique:categories,cat_des',
]);
  Category::find($request->cat_id)->update([
    'cat_name'=>$request->cat_name,
    'cat_des'=>$request->cat_des
  ]);
return redirect('add/category')->with('edit_status','Your Category edit Success');
}


public function restorecategory($category_id){
   Category::withTrashed()->find($category_id)->restore();
   return back()->with('restore_msg','Your category restore success');
 
}

public function parmanentdeletecategory($category_id){
  Category::withTrashed()->find($category_id)->forceDelete();
  return back()->with('pdelete_msg','Your category parmanently delete success');
}

function markdelete(Request $request){

   if(isset($request->category_id)){
  foreach ($request->category_id as $cat_id) {
   Category::find($cat_id)->delete();
  }

  }
  return back()->with('delete_status','Your Category Delete Success');

}

function markrestore(Request $request){
  if(isset($request->category_id)){
 foreach ($request->category_id as $cat_id) {
  Category::withTrashed()->find($cat_id)->restore();
 }

 }
 return back()->with('delete_status','Your Category Delete Success');

}
}