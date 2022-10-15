<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Team;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
            'first_name'=>$this->faker->firstName,
            'last_name'=>$this->faker->lastName,
            'email'=>$this->faker->email,
            'team_id'=>Team::factory(),
        ];
    }
}
