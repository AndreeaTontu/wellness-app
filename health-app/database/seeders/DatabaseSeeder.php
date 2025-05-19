<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // List of seeders
        $this->call([
            UserSeeder::class,
            Health_conditionSeeder::class,
            RecommendationSeeder::class,
        ]);
    }
}
