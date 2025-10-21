<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $names = [
            'Electronics', 'Books', 'Clothing', 'Home',
            'Toys', 'Sports', 'Beauty', 'Garden',
            'Automotive', 'Music'
        ];

        foreach ($names as $name) {
            Category::create(['name' => $name]);
        }
    }
}
