<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address' => $this->faker->address(),
            'province' => $this->faker->state(),
            'regency' => $this->faker->city(),
            'district' => $this->faker->streetSuffix(),
            'village' => $this->faker->streetName(),
            'campus_id' => $this->faker->unique()->numberBetween(1, 50),
        ];
    }
}
