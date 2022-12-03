<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category_id' => [
                'required',
            ],
            'name' => 'required',
            'slug' => 'required',
            'small_description' => 'required|min:1',
            'description' => 'required|min:1',
            'original_price' => 'required',
            'selling_price' => 'required',
            'image' => '',
            'qty' => 'required',
            'tax' => '',
            'status' => '',
            'trending' => '',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
        ];
    }
}
