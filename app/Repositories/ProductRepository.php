<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ProductRepository
{
    public function save($request, Product $product = null)
    {
        try {
            $product = DB::transaction(function () use ($request, $product) {
                $latestProduct = Product::whereYear('created_at', date('Y'))->count();

                if (! $product) {
                    $product = new Product();
                    $product->sku = str_pad($request->category, 3, "0", STR_PAD_LEFT) . date('Y') . str_pad($latestProduct + 1, 4, "0", STR_PAD_LEFT);
                } else {
                    if ($product->name != $request->name) {
                        if (Product::where('name', $request->name)->exists()) {
                            throw ValidationException::withMessages(['name' => 'Nama produk sudah ada, silahkan isi dengan nama produk lain']);
                        }
                    }
                }

                $product->category_id = $request->category;
                $product->name = $request->name;
                $product->save();
                
                $productDetail = new ProductDetail();
                $productDetail->product_id = $product->id;
                $productDetail->description = $request->description;
                $productDetail->price = $request->price;
                $productDetail->image = $request->image_url;
                $productDetail->save();

                return $product;
            }, 2);
        } catch (\Throwable $th) {
            throw $th;
        }

        return $product;
    }

    public function delete(Product $product)
    {
        if (! $product) {
            return false;
        }

        $product->delete();

        return true;
    }
}
