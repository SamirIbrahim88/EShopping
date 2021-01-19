<?php
namespace App\Traits;

//save any photo to server images folder
Trait ProductTrait{
    function savePhoto($photo,$dist){

        $ext = $photo->getClientOriginalExtension();
        $file_name = time() . '.' . $ext; //1645345.jpg
        $path = $dist;
        $photo->move($path, $file_name);
        return $file_name;
    }
}

