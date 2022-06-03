<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'product_name' => $this->faker->name,
            'product_description' => $this->faker->text,
            'product_price' => $this->faker->numberBetween(10000, 5000000),
            'product_quantity' => $this->faker->numberBetween(10, 500),
            'product_image' => $this->faker->imageUrl($width = 200, $height = 200),
            'product_status' => $this->inReplyToStatusId = $this->faker->randomNumber(1,2),
        ];
    }
}
