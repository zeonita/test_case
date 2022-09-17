<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = 'Tas';
        $category->save();

        $category = new Category();
        $category->name = 'Handphone';
        $category->save();

        $category = new Category();
        $category->name = 'Baju';
        $category->save();
    }
}
