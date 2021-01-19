<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Category;
use App\Traits\ProductTrait;

class ProductController extends Controller
{
    use ProductTrait;
    public function show_products()
    {
        //assign getten data from productmodel to array
        //manual pagination line
        //$products = Product::orderBy('created_at','DESC')->get();
        $products = Product::orderBy('created_at','DESC')->paginate(PAGINATE);
        $max = Product::max('buy_price');
        $min = Product::min('buy_price');
        $categories = Category::get();
        //return a view with $productsArray Data
        return view('admin.products_list', compact('products','max','min'), compact('categories'));
    }

    // Add New Product function
    public function addnew_product(ProductRequest $data)
    {

        // validate inputs comming from view fields
        // using flash insted of all in validation to store inputs values in a session while validation
        // and in view add value property to all inputs value ="{{old(input name)}}"

        // call ProductRequest function from App\Http\Requests\ProductRequest;

        //Upload product photo using ProductTrait function
        $file_name = $this->savePhoto($data->photo,'images/products');
        // insert a new product into products table in DB
        Product::create([
            'name' => $data->name,
            'buy_price' => $data->bprice,
            'sell_price' => $data->sprice,
            'qty' => $data->qty,
            'details' => $data->details,
            'photo' => $file_name,
            'category_id' => $data->category
        ]);
        return redirect()->back()->with('success', 'new producted created successfully');
    }

    //edit a product
    public function edit_product($id)
    {
        $product = Product::find($id);
        $category = Category::get();
        if(!$product){
            //return abort('404');
            return redirect()->route('products.list');
        }
        //$arr1 = array('category' =>$category);
        //$arr = array('product' => $product);
        return view('admin.edit_product', compact('product','category'));
    }

    //update a product
    public function update_product(Request $request,$id)
    {

        $product = Product::find($id);
        if(!$product){
            return redirect()->route('products.list');
        }
        //RE-Upload product photo
/*         if (isset($request->photo)) {
            $ext = $request->photo->getClientOriginalExtension();
            $file_name = time() . '.' . $ext; //1645345.jpg
            $path = 'images/products';
            $request->photo->move($path, $file_name);
            $product->photo = $file_name;
        } */
        if($request->has('photo')){
            $file_name = $this->savePhoto($request->photo,'images/products');
            Product::find($id)->update(['photo'=>$file_name]);
        }
        //$product->photo = $file_name;
        $product->name = $request->name;
        $product->buy_price = $request->bprice;
        $product->sell_price = $request->sprice;
        $product->qty = $request->qty;
        $product->details = $request->details;
        $product->category_id =$request->category;
        $product->save();
        return redirect()->back()->with('success', 'Product updates successfully');
    }

    // delete a product
    public function delete_product($id)
    {
        $product = Product::find($id);
        $product->delete(); // delete row from child table
        unlink("images/products/$product->photo");// delete product photo from server
        //$product->categories()->delete(); // delete Parent rows
        return redirect()->back()->with('deleted', 'Product deleted successfully');
    }

    // call crate_product view
    public function create_product1()
    {
        // get all rows in category && put values in dropdownlist
        $categories = Category::get();
        return view('admin.edit_product', compact('categories'));
    }

    //Search Products called in dashboard using Ajax
    public function search_products(Request $request){
        // comming from user search field
        $data = '%' . $request->K . '%';
        $products = Product::where('name','like',$data)->get();
        if(isset($products) && $products->count() > 0){
            foreach($products as $product){
                echo "<p> <a href='/admin/Product-Details/$product->id'>$product->name </a></p>";
            }
        }
        else{
            echo "Not Found";
        }

    }
    //get searched product details
    public function show_product_details($id){
        $product = Product::find($id) ;
        return view('admin.product_details',compact('product'));
    }
}
