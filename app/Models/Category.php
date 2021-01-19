<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];

    // function to get products under spcefic category
    public function products()
    {
        // make a relation between Category table  and product table
        return $this->hasMany('App\Models\Product');
    }
}
