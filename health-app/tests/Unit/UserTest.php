<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    // Test if the User model the fillable attributes assigned correctly.
    public function test_user_has_correct_fillable_attributes()
    {
        $user = new User;

        $this->assertEquals([
            'name',
            'email',
            'password',
            'role_id',
        ], $user->getFillable());
    }

    // Testing if the user with role id 1 is admin
    public function test_user_is_admin()
    {
        $admin = User::factory()->create([
            'role_id' => 1,
        ]);
        $this->assertEquals(1, $admin->role_id);
    }

    // Testing if the user with role id 2 a regular user.
    public function test_user_is_regular_user()
    {
        $user = User::factory()->create([
            'role_id' => 2,
        ]);
        $this->assertEquals(2, $user->role_id);
    }
}
