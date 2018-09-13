<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class LoginTest extends DuskTestCase
{
    /** @eest    */
    public function test_user_can_login()
    {
        $user = factory(User::class)->create([
            'email' => 'dschumbi@gmail.de',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/');
        });
    }

    /** @test */
    public function test_user_can_authenticate()
    {
        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/');
        });
    }
}
