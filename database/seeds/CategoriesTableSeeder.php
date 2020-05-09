<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'=>'High Tech',
            'slug'=>'high-tech'
        ]);
        Category::create([
            'name'=>'Cuisine',
            'slug'=>'cuisine'
        ]);
        Category::create([
            'name'=>'Culture',
            'slug'=>'culture'
        ]);
        Category::create([
            'name'=>'Santé',
            'slug'=>'santé'
        ]);
        Category::create([
            'name'=>'Style',
            'slug'=>'style'
        ]);
    }
}
