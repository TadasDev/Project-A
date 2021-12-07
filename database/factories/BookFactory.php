<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=> \App\Models\User::inRandomOrder()->value('id'),
            'title' => $this->faker->text(10),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2 ,5,250),
        ];
    }
}
