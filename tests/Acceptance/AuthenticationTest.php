<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthenticationTest extends TestCase
{
    /**
     * Test the ability for a user to log into the application.
     *
     * @return void
     */
    public function testApplicationLogin()
    {
        $this->visit('/auth/login')
             ->type('admin@canvas.com', 'email')
             ->type('password', 'password')
             ->press('submit')
             ->seePageIs('/admin/post');
    }

    /**
     * Test the ability for a user to log out of the application.
     *
     * @return void
     */
    public function testApplicationLogout()
    {
        $this->visit('/auth/login')
             ->type('admin@canvas.com', 'email')
             ->type('password', 'password')
             ->press('submit')
             ->seePageIs('/admin/post')
             ->click('logout')
             ->seePageis('/auth/login');
    }
}
