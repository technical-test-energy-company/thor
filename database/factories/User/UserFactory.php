<?php

namespace Database\Factories\User;

use App\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => fake()->userName(),
            'email' => fake()->safeEmail(),
            'password' => fake()->password(),
        ];
    }
}
