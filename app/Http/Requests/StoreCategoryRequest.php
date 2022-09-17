<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:categories|max:100',
        ];
    }

    public function messages()
    {
        return [
            'name.required'    => 'Nama kategori tidak boleh kosong',
            'name.unique'      => 'Nama kategori sudah ada, silahkan isi dengan nama kategori lain.',
            'name.max'         => 'Nama kategori tidak boleh lebih dari 100 karakter.'
        ];
    }
}
