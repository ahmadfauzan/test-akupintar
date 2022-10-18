<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CampusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['University', 'Institut']) . ' ' . $this->faker->city(),
            'logo' => $this->faker->imageUrl(),
            'accreditation' => $this->faker->randomElement(['A', 'B', 'C']),
            'telephone' => $this->faker->tollFreePhoneNumber(),
            'fax' => $this->faker->phoneNumber(),
            'website' => $this->faker->domainName(),
            'is_polytechnic' => $this->faker->randomElement([1, 0]),
            'type_id' => $this->faker->numberBetween(1, 3),
            'status_id' => $this->faker->numberBetween(1, 5),
            'website' => $this->faker->domainName(),
        ];
    }
}
