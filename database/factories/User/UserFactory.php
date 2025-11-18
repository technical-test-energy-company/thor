<?php

namespace Database\Factories\User;

use App\Asset\Asset;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = Asset::class;

    public function definition(): array
    {
        return [
            'name' => fake()->userName(),
            'email' => fake()->safeEmail(),
            'password' => fake()->password(),
        ];
    }
}
