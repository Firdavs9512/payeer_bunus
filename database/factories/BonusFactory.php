<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bonus>
 */
class BonusFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $times = 100000;
        $data = $this->radom_bonus();
        return [
            'bonus' => $data[1],
            'ip' => fake()->unique()->localIpv4(),
            'bonus_number' => $data[0],
            'user_id' => User::all()->random()->id,
            'time' => $times+=3600,
        ];
    }

    // Random bonus yaratadigan function
    private function radom_bonus()
    {
        $son = rand(1,1000);

        $sum = 0.01;
        if ($son <= 980){
            $sum = 0.05;
        }elseif ($son >980 && $son <= 995) {
            $sum = 0.3;
        }elseif ($son >995 && $son <=999) {
            $sum = 0.50;
        }elseif ($son == 1000) {
            $sum = 1.0;
        }

        return [$son, $sum];
    }

}
