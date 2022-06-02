<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $phone = rand(0,1) ? $this->faker->phoneNumber : null;
        $bio = rand(0,1) ? $this->faker->paragraph : null;
        $birthdate = rand(0,1) ? $this->faker->date : null;

        return [
            'phone' => $phone,
            'bio' => $bio,
            'birthdate' => $birthdate
        ];
    }
}
