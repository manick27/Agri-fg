<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'name' => $this->faker->name,
            'email' => 'nguewouom@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$D3s8jlXMAA4SSWeKiGgNheZqc46kNg4iiJ2k6M2nps4TNFeN/SNKS', // password
            'remember_token' => Str::random(10),
        ];
    }
}
