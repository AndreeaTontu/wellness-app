<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class GuestUserTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     */
    public function test_guest_users_can_see_the_home_page(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/health')
                ->assertSee('Log In')
                ->assertSee('Sign Up')
                ->assertSee('Welcome to our wellness app!');

        });
    }
}
