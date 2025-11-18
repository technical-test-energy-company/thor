<?php

namespace Database\Seeders\User;

use App\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = new User;

        $user->fill([
            'name' => Config::get('user.name'),
            'email' => Config::get('user.email'),
            'password' => Config::get('user.password'),
        ]);

        $user->save();
    }
}
