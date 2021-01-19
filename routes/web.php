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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

/* Route::get('/home',function(){
    return view('frontend.index');
}); */


Route::group(['namespace' => 'FrontEnd'], function () {
    Route::get('/','SiteController@inedx')->name('site.home');
    Route::post('/All-products/{id}','SiteController@show_products')->name('show.products');
});
