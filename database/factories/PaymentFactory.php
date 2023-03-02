<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::all()->random();
        return [
            'payeer_adress' => $user->payeer,
            'number' => fake()->unique()->numberBetween(100000),
            'name' => $user->name,
            'user_id' => $user->id,
            'summ' => fake()->randomFloat(3,1,30),
            'status' => true,
        ];
    }
}
