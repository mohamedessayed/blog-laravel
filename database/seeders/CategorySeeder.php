<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = ['Drama', 'Romantic','Action'];
        //

        foreach ($categories as $category) {
            # code...
            Category::create([
                'category_name'=>$category
            ]);
        }
    }
}
