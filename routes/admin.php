<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

//constant for the number of pages in  pagination
define('PAGINATE',5);
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
Route::get('/admin', function () {
    return view('admin.index');
})->name('admin.login');
*/

// group similar function in the same root
Route::group(['prefix' => 'admin' , 'namespace' => 'Admin'], function () {
    //login && users management Routes
    Route::get('/','AdminController@index')->name('index');
    Route::post('/login','AdminController@login')->name('admin.login');
    Route::get('/logout','AdminController@logout')->name('admin.logout');
    Route::get('/Product-Details/{id}','ProductController@show_product_details')->name('product.details');
});

Route::group(['prefix' => 'admin/dashboard','namespace'=>'Admin',
'middleware'=>'prevent'], function () {
    Route::get('/','AdminController@dashboard')->name('dashboard')->middleware('prevent');
    Route::get('/users','AdminController@show_users')->name('admin.show.users');
    //Category Routes
    Route::get('/category','AdminController@create_category')->name('create.category');
    Route::get('/show-products/{id}','CategoryController@show_category_products')->name('show.category');
    Route::post('/save-category','CategoryController@addnew_category')->name('addnew.category');
    Route::get('/delete-category/{id}','CategoryController@delete_category')->name('delete.category');
    Route::get('/edit-category/{id}','CategoryController@edit_category')->name('edit.category');
    Route::post('/edit-category/{id}','CategoryController@update_category')->name('update.category');
    //Product Routes
    Route::get('/products','AdminController@create_product')->name('create.product');
    Route::post('/products','ProductController@addnew_product')->name('addnew.product');
    Route::get('/products-list','ProductController@show_products')->name('products.list');
    Route::get('/delete-product/{id}','ProductController@delete_product')->name('delete.product');
    Route::get('/edit-product/{id}','ProductController@edit_product')->name('edit.product');
    //Route::get('/edit-product/{id}','AdminController@fill_categoriesList')->name('create.product2');
    Route::post('/edit-product/{id}','ProductController@update_product')->name('update.product');
    Route::post('/search-product','ProductController@search_products')->name('search.products');
    //Route::get('/Product-Details/{id}','ProductController@show_product_details')->name('product.details');

    //Vendors Routes
    Route::get('/show-vendors','VendorController@show_vendors')->name('show.vendors');
    Route::post('/save-vendor','VendorController@addnew_vendor')->name('addnew.vendor');
    Route::get('/show-vendors-phone/{id}','VendorController@vendor_phone')->name('show.vendors.phone');
    Route::get('/show-vendors-products/{id}','VendorController@show_vendors_products')->name('vendors.products');
    Route::post('/add-products-to-vendor','VendorController@save_vendor_products')->name('save.vendor.products');
    Route::get('/get-inactive-vendors','VendorController@show_inactive_vendors')->name('Show.inactive.vendors');
});



/*Route::get('/admin/dashboard',function(){
    return view('admin.dashboard');
});
*/
