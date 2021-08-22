<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','FrontendController@index');
Route::get('product/details/{slug}','FrontendController@productdetails');
Route::get('contact','FrontendController@contact')->name('contact');
Route::get('shop/page','FrontendController@shoppage');
//Contact Controller

Route::post('contact/insert','FrontendController@contactinsert');
Auth::routes(['verify' => true]);
//HomeController
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('contact/info','HomeController@contactinfo');
Route::get('send/newsletter','HomeController@sendnewsletter');
Route::get('contact/upload/download/{contact_id}','HomeController@contactuploaddownload');

//CategoryController
Route::get('add/category','CategoryController@addcategory')->name('addcategory');
Route::post('add/category/post','CategoryController@addcategorypost');
Route::get('delete/category/{category_id}','CategoryController@deletecategory');
Route::get('edit/category/{category_id}','CategoryController@editcategroy');
Route::post('edit/category/post','CategoryController@editcategroypost');
Route::get('restore/category/{category_id}','CategoryController@restorecategory');
Route::get('parmanent/delete/category/ {category_id}','CategoryController@parmanentdeletecategory');
Route::post('mark/delete','CategoryController@markdelete');
Route::post('mark/restore','CategoryController@markrestore');

//Profile Controller
Route::get('profile','ProfileController@profile');
Route::post('profile/edit/post','ProfileController@profileeditpost');
Route::post('edit/password/post','ProfileController@editpasswordpost');
Route::post('change/profile/photo','ProfileController@changeprofilephoto');

//Product Controller
Route::resource('product','ProductController');

//Cart Controller

Route::get('cart','CartController@index')->name('cart.index');
Route::post('cart/store','CartController@store')->name('cart.store');