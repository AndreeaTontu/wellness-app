<?php

namespace Tests\Unit;

use App\Models\HealthCondition;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase; // This will reset the DB after each test

    public function test_health_condition_can_be_created()
    {
        $condition = HealthCondition::create([
            'name' => 'Diabetes',
            'description' => 'A chronic health condition affecting blood sugar.',
        ]);

        $this->assertDatabaseHas('health_conditions', [
            'name' => 'Diabetes',
        ]);
    }
}
