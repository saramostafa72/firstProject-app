<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user=User::inRandomOrder()->first();
        if(!$user)
        {
           $user=User::factory()->create();
        }
        return [
            //
            'price'=>fake()->numberBetween(100,1000),
            'user_id'=>$user->id
        ];
    }
}
