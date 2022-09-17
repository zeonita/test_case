<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{    
    public function index()
    {
        return view('product.index');
    }
    
    public function add()
    {
        $categories = Category::get();

        return view('product.add', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        $request->validated();

        try {
            $product = (new ProductRepository())->save($request);
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect()->route('product.index')->with('success', "Sukses. Data produk $product->name berhasil disimpan.");
    }

    public function edit(Product $product)
    {
        $categories = Category::get();

        return view('product.edit', compact('categories', 'product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $request->validated();

        try {
            $product = (new ProductRepository())->save($request, $product);
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect()->route('product.index')->with('success', "Sukses. Data produk $product->name berhasil diubah.");
    }

    public function destroy(Product $product)
    {
        $product = (new ProductRepository())->delete($product);

        if (! $product) {
            return response()->json(['status' => 'Not Found', 'message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(['status' => 'OK', 'message' => 'Data berhasil dihapus'], 200);
    }
}