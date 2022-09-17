<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Str;

class ProductApiController extends Controller
{
    public function list(Request $request)
    {
        $products = Product::with(['detail', 'category'])->limit($request->length)->offset($request->start)->get();
        $total_data = Product::count();

        $data = [
            'draw' => intval($request->draw),
            'recordsTotal' => $total_data,
            'recordsFiltered' => $total_data,
            'data' => $products
        ];

        return response()->json($data);
    }

    public function uploadImage(Request $request)
    {
        if ($request->image) {
            $file = $request->image;
            $filename = date('YmdHi') . '-' . Str::uuid() . '.' . $request->image->extension();
            $file->move(public_path('product'), $filename);
        }

        $path = '/product/' . $filename;
        
        return $path;
    }
}
