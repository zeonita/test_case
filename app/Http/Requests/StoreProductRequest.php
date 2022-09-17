<?php

namespace App\Http\Requests;

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
            'category' => 'required',
            'name' => 'required|unique:products|max:100',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'category.required' => 'Kategori produk tidak boleh kosong',
            'name.required' => 'Nama produk tidak boleh kosong',
            'name.unique' => 'Nama produk sudah ada, silahkan isi dengan nama produk lain',
            'name.max' => 'Nama produk maksimal 100 karakter',
            'price.required' => 'Harga produk tidak boleh kosong',
            'description.required' => 'Deskripsi produk tidak boleh kosong',
            'image.required' => 'Foto produk tidak boleh kosong'
        ];
    }
}
