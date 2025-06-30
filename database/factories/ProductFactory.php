<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->words(2, true);
        $imageUrl = Str::replace(' ', '+', $name);
        return [
            'category_id' => Category::factory(),
            'name'=>$name,
            'description'=>fake()->paragraph(),
            'price'=>fake()->randomFloat(2, 10, 500), // Random price between 10 and 1000
            'rating'=>fake()->randomFloat(1, 1, 5),
            'stock'=>fake()->numberBetween(10, 100),
            'quantity_sold'=>fake()->numberBetween(0, 200),
            'featured_image'=> "https://placehold.co/600x400/orange/white?text=$imageUrl",
        ];
    }
}
