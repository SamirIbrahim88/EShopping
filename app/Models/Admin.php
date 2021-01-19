<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';
    protected $fillable = ['email', 'username','password','role','created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];

    // Accessors differ between app users types
    // this function Used in AdminController in show_users Method to return the type of User
    public function getRoleAttribute($value)
    {
        return $value == 1 ? 'Supper Admin' : 'Admin';
    }
}
