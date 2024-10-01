<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories= [
            [ 'name' => 'Momo','description' => '...'],
            [ 'name' => 'Chowmein','description' => '...'],
            [ 'name' => 'Pizza','description' => '...'],
            [ 'name' => 'Cold Drinks','description' => '...'],
            [ 'name' => 'Beverages','description' => '...'],
            [ 'name' => 'Pakoda','description' => '...'],
            [ 'name' => 'Chicken Specials','description' => '...'],
                     ];
            foreach($categories as $category)
            {
                Category::create($category);
            }
    }
}
