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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:3', 'max:255'],
            'description' => ['nullable', 'max:255'],
            'price'=>['required','numeric'],
            'expire' => ['required', 'date', 'after:publish'],
            'publish' => ['required', 'date'],
            'path_img' => ['mimes:jpg,png,webp'],
            'path_pdf' => ['mimes:pdf'],
                        
        ];
    }
}
