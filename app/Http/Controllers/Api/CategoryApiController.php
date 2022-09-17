<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function list(Request $request)
    {
        $categories = Category::limit($request->length)->offset($request->start)->get();
        $total_data = Category::count();

        $data = [
            'draw' => intval($request->draw),
            'recordsTotal' => $total_data,
            'recordsFiltered' => $total_data,
            'data' => $categories
        ];

        return response()->json($data);
    }
}
