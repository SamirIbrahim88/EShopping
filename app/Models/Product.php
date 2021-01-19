<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $table ='products';
     protected $fillable = ['name','buy_price','sell_price','qty','details','photo','category_id','created_at','updated_at'];
     protected $hidden =['created_at','updated_at','pivot'];

     // Category which product belongs to it
     public function categories(){
         return $this->belongsTo('App\Models\Category','category_id','id');
     }

     // vendors which product belongs to it
     public function vendors(){
        return $this->belongsToMany('App\Models\Vendor','vendors_products',
                            'vendor_id','product_id','id','id');
     }
}
