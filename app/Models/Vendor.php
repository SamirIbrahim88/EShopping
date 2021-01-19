<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use Notifiable;
    protected $table = 'vendors';
    protected $fillable = ['name', 'phone', 'email', 'password', 'status', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at', 'pivot'];

    public function products()
    {
        return $this->belongsToMany(
            'App\Models\Product',
            'vendors_products',
            'vendor_id',
            'product_id',
            'id',
            'id'
        ); //ids from vendor table && product table
    }

    public function phone()
    {
        return $this->hasOne('App\Models\Phone', 'vendor_id');
    }

    //get inactive vendors method then call it in VendorController
    // where  -- whereNull -- whereNotNull
    public function scopeInactive($q)
    {
        return $q->select('id','name','status','address')->where('status', 0)->whereNull('address');
    }

    //Accessors
    public function getStatusAttribute($value){
        return $value == 0 ?'InActive' :'Active';
    }
}
