<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function test_users_can_login(): void
    {
        $user = User::factory()->create([
            'email' => 'this_email@outlook.com',
            'password' => bcrypt('pass55'),
            'role_id' => 2,
        ]);

        $this->browse(function ($browser) {
            $browser->visit('/login')
                ->type('email', 'this_email@outlook.com')
                ->type('password', 'pass55')
                ->press('Sign in')
                ->assertPathIs('/health');
        });
    }
}
