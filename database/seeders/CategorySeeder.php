<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = [
            ['name' => 'romance', 'description' => 'Fictional books and novels.'],
            ['name' => 'horror', 'description' => 'Non-fictional books including scary stories'],
            ['name' => 'adventure', 'description' => 'Adventure genre books including discovries and fun stories.'],
            ['name' => 'history', 'description' => 'Non-fictional books including biographies, history, etc'],
            ['name' => 'fantasy', 'description' => 'Fantasy genre books including magical and mythical stories.'],
            ['name' => 'tragedy', 'description' => 'Tragedyy genre books including sad stories.'],
            ['name' => 'science', 'description' => 'Books related to science and technology.'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
