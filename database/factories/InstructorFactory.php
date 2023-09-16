<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instructor>
 */
class InstructorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->tollFreePhoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'designation' => $this->faker->jobTitle(),
            'photo' => $this->faker->imageUrl($width = 640, $height = 480),
            'status' => $this->faker->boolean(),
            'password' => '12345678',
            'remember_token' => Str::random(10),
        ];
    }
}
