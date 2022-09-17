<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'category' => 'required',
            'name' => 'required|max:100',
            'price' => 'required',
            'description' => 'required',
            'image_url' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'category.required' => 'Kategori produk tidak boleh kosong',
            'name.required' => 'Nama produk tidak boleh kosong',
            'name.max' => 'Nama produk maksimal 100 karakter',
            'price.required' => 'Harga produk tidak boleh kosong',
            'description.required' => 'Deskripsi produk tidak boleh kosong',
            'image_url.required' => 'Foto produk tidak boleh kosong'
        ];
    }
}
