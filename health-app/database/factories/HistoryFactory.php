<?php

namespace Database\Factories;

use App\Models\HealthCondition;
use App\Models\History;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class HistoryFactory extends Factory
{
    protected $model = History::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // creates a user and gets its ID
            'health_condition_id' => HealthCondition::factory(), // creates a health condition and gets its ID
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
