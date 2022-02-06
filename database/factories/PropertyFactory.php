<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'street_address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'province' => 'ON',
            'postal_code' => $this->faker->postcode()
        ];
    }
}
