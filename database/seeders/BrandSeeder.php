<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $names = [
            'Sony', 'Apple', 'Nike', 'Adidas',
            'Samsung', 'LG', 'Dell', 'HP',
            'Canon', 'Lenovo'
        ];

        foreach ($names as $name) {
            Brand::create(['name' => $name]);
        }
    }
}
