<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class CategoryController extends Controller
{
    public function addnew_category(Request $data)
    {
        // validate inputs
        $validator = Validator::make(
            $data->all(),
            [
                'name' => 'required|unique:categories,name'
            ],
            [
                'name.required' => 'Category Name field is required',
                'name.unique' => 'Category Name is taken'
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data->all());
        }
        //insert new category comming from from
        Category::create(['name' => $data->name]);
        // redirect with message
        return redirect()->back()->with('success', 'new category creted successfully');
    }

    //edit a category
    public function edit_category($id)
    {
        $category = Category::find($id);
        $arr = array('category' => $category);
        return view('admin.edit_categoy', $arr);
    }

    //update a category
    public function update_category($id, Request $request)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->back()->with('success', 'Category updates successfully');
    }

    // delete a category
    public function delete_category($id)
    {
        $category = Category::find($id);
        $category->delete(); // delete row from parent table
        $category->products()->delete(); // delete child rows
        return redirect()->back()->with('deleted', 'Category deleted successfully');
    }

    //show category's products
    public function show_category_products($id){
         $category = Category::find($id);
         $products = $category->products()->get();
         return view('admin.all_cat_products', compact('products'));
    }
}
