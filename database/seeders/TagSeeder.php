<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $names = [
            'New', 'Sale', 'Popular', 'Limited',
            'Eco', 'Premium', 'Budget', 'Gift',
            'Top', 'Trending', 'Exclusive', 'Hot',
            'Classic', 'Modern', 'Essential', 'Luxury',
            'Fast', 'Smart', 'Compact', 'Durable'
        ];

        foreach ($names as $name) {
            Tag::factory()->create(['name' => $name]);
        }
    }
}
