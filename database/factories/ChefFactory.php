<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chef>
 */
class ChefFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->name,
            'speciality'=>$this->faker->randomElement(['Pastry','Cookie','Pancake']),
            'image'=>$this->faker->randomElement(["assets/images/chefs-01.jpg","assets/images/chefs-02.jpg"])
        ];
    }
}
