<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Product;
use App\Notifications\VendorCreated;
use Illuminate\Notifications\Notification;

class VendorController extends Controller
{
    public function show_vendors()
    {
        //$vendors = Vendor::get();
        $vendors = Vendor::paginate(PAGINATE);
        return view('admin.show_vendors', compact('vendors'));
    }

    public function addnew_vendor(Request $data){
                // validate inputs
                $validator = Validator::make(
                    $data->all(),
                    [
                        'name' => 'required|unique:vendors,name',
                        'phone' =>'required|unique:vendors,phone',
                        'email' => 'required|email',
                        'password' => 'required'
                    ],
                    [
                        'name.required' => 'Vendor Name field is required',
                        'name.unique' => 'Vendor Name is taken',
                        'phone.required' => 'Vendor Phone field is required',
                        'phone.unique' => 'Vendor Phone is taken',
                        'email.required' => 'Vendor email field is required',
                        'email.unique' => 'Vendor email is taken',
                        'password.required' => 'password Name field is required'

                    ]
                );
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput($data->all());
                }
                //insert new category comming from from
                $vendor = Vendor::create([
                    'name' => $data->name,
                    'phone'=>$data->phone,
                    'email'=>$data->email,
                    'password'=>$data->password]);

                Notification::send($vendor,new VendorCreated($vendor));
                // redirect with message
                return redirect()->back()->with('success', 'new category creted successfully');
    }

    // get vendor phone
    public function vendor_phone($id)
    {

        $vendor = Vendor::with(['phone' => function ($q) {
            $q->select('code', 'vendor_id')->where('code', '02');
        }])->find($id);
        return view('admin.vendor_details',compact('vendor'));
    }

    public function show_vendors_products($id)
    {
        //return Vendor::with('products')->find(2);

        $vendor = Vendor::find($id);
        $products = $vendor->products;
        $all_products = Product::get();
        return view('admin.vendor_products', compact('products', 'vendor', 'all_products'));
    }

    // Get inactive Vendors
    public function show_inactive_vendors(){
        //return Vendor::where('status',0)->get();
        return Vendor::inactive()->get();
    }

    public function Save_vendor_products(Request $request)
    {
        $vendor = Vendor::find($request->vendor_id);
        //attatch accepts dublication of data
        // $vendor->products()->attatch($request->all_products);
        $vendor->products()->syncWithoutDetaching($request->all_products);
        return redirect()->back()->with('success', 'Products added succesfully to vendor');
    }
}
