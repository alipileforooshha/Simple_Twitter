<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username'=> $this->faker->name(),
            'email'=> $this->faker->email(),
            'bio'=> Str::random(20),
            'email_verified_at'=> now(),
            'password'=>Hash::make('password'),
            'remember_token'=>Str::random(10)
        ];
    }
}
