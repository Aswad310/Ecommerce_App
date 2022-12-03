<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCategoryRequest extends FormRequest
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
            'name' => [
                'required',
                Rule::unique('categories')->ignore($this->id),
            ],
            'slug' => 'required',
            'description' => 'required|min:1',
            'status' => '',
            'popular' => '',
            'image' => '',
            'meta_title' => 'required',
            'meta_descrip' => 'required',
            'meta_keywords' => 'required',
        ];
    }
}
