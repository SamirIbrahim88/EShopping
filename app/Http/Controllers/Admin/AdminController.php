<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    // call index view
    public function index()
    {
        return view('admin.index');
    }

    //login function
    public function login(Request $request)
    {
        //return $request;
        //$user = $request->username;

        $email = $request->email;
        $pass = $request->password;

        $login = Admin::select('username', 'email', 'password')
            ->where('email', $email)
            ->where('password', $pass)->get();

        if ($login->count() == 1) {
            //return redirect()->route('dashboard');
            foreach ($login as $L) {
                $request->session()->put('userName', $L->username);
                $request->Session()->put('role', $L->role);
                return redirect()->route('dashboard');
            }
        } else {
            return redirect()->back()->with('failed', 'Invalid Logoin!!!');
        }
    }

    // User Sing Out
    public function logout(Request $request)
    {
        $request->Session()->flush();
        return redirect()->route('index');
    }

    // call dashboard view
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // get Web App Users
    public function show_users()
    {
        $admins = Admin::get();
        /* foreach ($admins as $admin) {
            $admin->role = $admin->role == 1 ? 'Super Admin' : 'Admin';
        } */
        return $admins;
    }

    // call create_category view
    public function create_category()
    {

        //$categories = Category::get();
        //using pagination insted of upper line
        $categories = Category::paginate(PAGINATE);
        //$categories = Category::get();
        return view('admin.create_category', compact('categories'));
    }
    // call crate_product view
    public function create_product()
    {
        // get all rows in category && put values in dropdownlist
        $categories = Category::get();
        return view('admin.create_product', compact('categories'));
    }

    // call crate_product view
    public function fill_categoriesList()
    {
        // get all rows in category && put values in dropdownlist
        $categories = Category::get();
        return view('admin.edit_product', compact('categories'));
    }
}
