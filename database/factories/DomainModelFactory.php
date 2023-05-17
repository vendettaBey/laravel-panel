<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DomainModel as Domain;


class DomainModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $random = random_int(1, 10);
        return [
            'user_id' => fake()->randomDigit(),
            'domain_id' => $random,
            'domain_name' => fake()->name(),
            'domain_status' => fake()->randomElement(['active', 'passive']),
            'start_date' => date('Y-m-d'),
            'end_date' => date("Y-m-d", strtotime(date('Y-m-d') . "+$random year")),
        ];
    }
}