<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'pname'=>'required',
           // 'direction_for_usage'=>'required',
            //'key_benifits'=>'required',
            'description'=>'required',
            'price'=>'required',
            'price_description'=>'required',
            'category_id'=>'required',         
            'brand_id'=>'required',            
          //  'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
          'image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'pname.required' => 'Name is required!',
            'brand_id.required' => 'Brand is required!',
            'image.required' => 'image is required!',
            'category_id.required' => 'category is required!',
            'image.mimes' => 'Please select correct image!'
        ];
    }
}
