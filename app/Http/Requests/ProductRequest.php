<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    //rules applied to form inputs
    public function rules()
    {
        return [
            'name' => 'required|unique:products,name',
            'bprice' => 'numeric|min:1|max:25000',
            'sprice' => 'numeric|min:1|max:30000',
            'photo' => 'required_without:id|mimes:png,jpg'
        ];
    }
//return messages when errors occours
    public function messages(){
        return[
            'name.required' => 'Product Name field is required',
            'name.unique' => 'Product Name is taken',
            'bprice.numeric' => 'Product Price must be numbrs only',
            'bprice.min' => 'Minimum Price 1 LE',
            'bprice.max' => 'Maximum Price 25000 LE',
            'sprice.numeric' => 'Product Price must be numbrs only',
            'sprice.min' => 'Minimum Price 1 LE',
            'sprice.max' => 'Maximum Price 30000 LE'
        ];
    }
}
