<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function inedx()
    {
        $categories = Category::take(5)->orderBy('created_at','DESC')->get();
        $products = Product::take(4)->orderBy('created_at','DESC')->get();
        return view('frontend.index',compact('categories','products'));
    }

/*     public function show_products(Request $request)
    {
        $id = $request->cid;
        $products = Product::where('category_id', $id)->get();
        if (isset($products) && $products->count() > 0) {
            foreach ($products as $product) {
                echo "
                <p><a href ='#'>$product->name </a></p>
                ";
            }
        } else {
        }
    } */
}
