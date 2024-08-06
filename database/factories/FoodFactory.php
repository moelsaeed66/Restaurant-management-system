<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));
        return [
            'title'=>$faker->productName,
            'image'=>$this->faker->imageUrl(),
            'description'=>$this->faker->text(),
            'price'=>$this->faker->numberBetween(100,200)
        ];
    }
}
