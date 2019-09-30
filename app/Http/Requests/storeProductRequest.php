<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeProductRequest extends FormRequest
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
    public function rules()
    {
        return [
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'price_origin' => 'required|numeric',
            'unit' => 'required',
            'qty' => 'required|numeric',
            'description' => 'required|max:255',
            'content' => 'required|max:255',
            'is_active' => 'required',
            'image' => 'sometimes|file|image|max:10000'
        ];
    }
}
