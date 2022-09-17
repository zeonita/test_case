<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();

        return view('category.index', compact('categories'));
    }

    public function add()
    {
        return view('category.add');
    }

    public function store(StoreCategoryRequest $request)
    {
        $request->validated();

        try {
            $category = (new CategoryRepository())->save($request);
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect()->route('category.index')->with('success', "Sukses. Data kategori $category->name berhasil disimpan.");
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(StoreCategoryRequest $request, Category $category)
    {
        $request->validated();

        try {
            $category = (new CategoryRepository())->save($request, $category);
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect()->route('category.index')->with('success', "Sukses. Data kategori $category->name berhasil diubah.");
    }

    public function destroy(Category $category)
    {
        $category = (new CategoryRepository())->delete($category);

        if (! $category) {
            return response()->json(['status' => 'Not Found', 'message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(['status' => 'OK', 'message' => 'Data berhasil dihapus'], 200);
    }
}