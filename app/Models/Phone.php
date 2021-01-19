<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = 'phones';
    protected $fillable = ['code', 'phone', 'vendor_id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function vendor()
    {
        return $this->belongsTo('App\Models\Vendor', 'vendor_id');
    }
}
