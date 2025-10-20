<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Category, Brand, Discount, Tag, Product};

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Predefined unique category names
        $categoryNames = [
            'Electronics', 'Books', 'Clothing', 'Home',
            'Toys', 'Sports', 'Beauty', 'Garden',
            'Automotive', 'Music'
        ];

        foreach ($categoryNames as $name) {
            Category::create(['name' => $name]);
        }

        // Predefined unique brand names
        $brandNames = [
            'Sony', 'Apple', 'Nike', 'Adidas',
            'Samsung', 'LG', 'Dell', 'HP',
            'Canon', 'Lenovo'
        ];

        foreach ($brandNames as $name) {
            Brand::create(['name' => $name]);
        }

        // Predefined unique tag names
        $tagNames = [
            'New', 'Sale', 'Popular', 'Limited',
            'Eco', 'Premium', 'Budget', 'Gift',
            'Top', 'Trending', 'Exclusive', 'Hot',
            'Classic', 'Modern', 'Essential', 'Luxury',
            'Fast', 'Smart', 'Compact', 'Durable'
        ];

        foreach ($tagNames as $name) {
            Tag::create(['name' => $name]);
        }

        // Random discounts
        Discount::factory()->count(5)->create();

        // Products with random tags
        Product::factory()->count(500)->create()->each(function ($product) {
            $product->tags()->attach(
                Tag::inRandomOrder()->take(rand(1, 5))->pluck('id')
            );
        });
    }
}
