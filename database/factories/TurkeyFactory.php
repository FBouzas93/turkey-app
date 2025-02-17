<?php

namespace Database\Factories;

use App\Models\Ability;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class TurkeyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $abilities = Ability::pluck('id')->toArray();
        
        return [
            'name' => fake()->name(),
            'status' => fake()->randomElement(['healthy', 'injured', 'dead']),
            'weight' => fake()->randomFloat(1, 5, 15),
            'birthdate' => fake()->date(),
            'ability_id' => fake()->randomElement($abilities),
        ];
    }
}
