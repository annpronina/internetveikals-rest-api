<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Tag;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::factory()->count(500)->create()->each(function ($product) {
            $product->tags()->attach(
                Tag::inRandomOrder()->take(rand(1, 5))->pluck('id')
            );
        });
    }
}
