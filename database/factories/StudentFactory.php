<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail,
            'age' => $this->faker->numberBetween(18, 24),
            'phone_no' => $this->faker->phoneNumber,
            'gender' => $this->faker->randomElement([
                'male',
                'female'
            ]),
        ];
    }
}
