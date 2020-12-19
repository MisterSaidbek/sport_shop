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
//
//Route::get('/', function () {
//    return view('welcome');
//});
Route::namespace('App\Http\Controllers')->group(function () {
Route::get('/','IndexController@index');

Route::match(['get','post'],'/admin','AdminController@login');

Route::group(['middleware' => ['auth']],function(){
    Route::get('/admin/dashboard', 'AdminController@dashboard');
    Route::get('/admin/settings', 'AdminController@settings');
    Route::get('/admin/check-pwd','AdminController@chkPassword');
    Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');


    //Category Routes(Admin)
    Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory');
    Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@editCategory');
    Route::match(['get','post'],'/admin/delete-category/{id}','CategoryController@deleteCategory');
    Route::get('/admin/view-categories','CategoryController@viewCategories');

    //Products Routes
    Route::match(['post','get'],'/admin/add-product','ProductsController@addProduct');
    Route::match(['get','post'],'/admin/edit-product/{id}','ProductsController@editProduct');
    Route::get('/admin/view-products','ProductsController@viewProducts');
    Route::get('/admin/delete-product-image/{id}','ProductsController@deleteProductImage');
    Route::get('/admin/delete-product/{id}','ProductsController@deleteProduct');







});

Route::get('/logout', 'AdminController@logout');
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cart', 'IndexController@cart')->name('cart');
Route::get('/404', 'IndexController@page404')->name('page404');
Route::get('/login_account', 'IndexController@login_account')->name('login_account');
Route::get('/product-details', 'IndexController@product_details')->name('product_details');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
