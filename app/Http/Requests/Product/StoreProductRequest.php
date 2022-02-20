<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'category_id' => ['required', 'numeric'],
            'price' => ['required', 'integer', 'min:1000'],
            'description' => ['nullable', 'string'],
            'image' => ['required', 'image'],
            'stock' => ['required', 'numeric', 'min:1'],
        ];
    }
}
