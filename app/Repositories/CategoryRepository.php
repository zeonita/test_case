<?php

namespace App\Repositories;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Request;

class CategoryRepository
{
    public function save(StoreCategoryRequest $request, Category $category = null)
    {
        if (! $category) {
            $category = new Category();
        }

        try {
            $category->name = $request->name;
            $category->save();
        } catch (\Throwable $th) {
            throw $th;
        }

        return $category;
    }

    public function delete(Category $category)
    {
        if (! $category) {
            return false;
        }

        $category->delete();

        return true;
    }
}
