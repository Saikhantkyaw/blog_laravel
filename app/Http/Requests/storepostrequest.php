<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storepostrequest extends FormRequest
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
              'name' => 'required|unique:posts|max:255',
              'description' => 'required|max:255',
              'category_id' =>'required',
        ];
    }

    public function messages()
{
    return [
        'name.required' => 'you have to fill your name',
        'description.required' => 'description is required',
        'category_id.required' =>'you should select category',
    ];
}
}
