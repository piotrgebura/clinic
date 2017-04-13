<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Zarejestruj')
                    ->assertSee('Rejestracja')
                    ->value('#name', 'Test User')
                    ->value('#email', 'test@email.com')
                    ->value('#password', 'test-password')
                    ->value('#password_confirmation', 'test-password')
                    ->click('input[type="submit"]')
                    ->assertPathIs('/');
        });
    }
}
