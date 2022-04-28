<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $created = $this->faker->dateTimeBetween('-10 years', 'now');
        $updated = $this->faker->dateTimeBetween($created, 'now');
        if(rand(0,4)>0){
            $updated = $created;
        }
        return [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraphs(3, true),
            'created_at' => $created,
            'updated_at' => $updated,
        ];
    }
}
