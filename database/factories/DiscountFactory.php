<?php

namespace Database\Factories;

use App\Models\Discount;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiscountFactory extends Factory
{
    protected $model = Discount::class;

    public function definition(): array {
        return [
            'name' => $this->faker->word(),
            'percentage' => $this->faker->randomFloat(2, 5, 50),
        ];
    }
}

