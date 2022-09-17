<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function save($request, Category $category = null)
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
