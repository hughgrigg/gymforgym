<?php

namespace GymForGym\Test\Functional\Auth;

use BrowserKitTestCase;
use GymForGym\User;

/**
 * Test user login functionality.
 */
class LoginBrowserKitTest extends BrowserKitTestCase
{
    /**
     * Should be able to go to the login form.
     */
    public function testCanGoToLoginForm()
    {
        $this->visit(route('login'))
            ->seePageIs(route('login'))
            ->see('Login');
    }

    /**
     * Should be able to log in with good credentials.
     */
    public function testCanLogin()
    {
        // Given I have a user account;
        $password = 'secret123';
        $user = factory(User::class)->create(['password' => bcrypt($password)]);

        // When I login with my credentials;
        $this->visit(route('login'))
            ->type($user->email, 'email')
            ->type($password, 'password')
            ->press('Login');

        // Then I should be logged in.
        $this->seeIsAuthenticated();
    }

    /**
     * Should not be able to login with bad credentials.
     */
    public function testBadCredentialsCanNotLogin()
    {
        // Given I have a user account;
        $user = factory(User::class)->create(['password' => bcrypt('secret123')]);

        // When I login with bad credentials;
        $this->visit(route('login'))
            ->type($user->email, 'email')
            ->type('bad password', 'password')
            ->press('Login');

        // Then I should not be logged in.
        $this->dontSeeIsAuthenticated();
    }

    /**
     * Should be able to log out.
     */
    public function testLogout()
    {
        // Given I have a user account;
        $password = 'secret123';
        $user = factory(User::class)->create(['password' => bcrypt($password)]);

        // And I login with my credentials;
        $this->visit(route('login'))
            ->type($user->email, 'email')
            ->type($password, 'password')
            ->press('Login')
            ->seeIsAuthenticated();

        // When I log out;
        $this->press('Log out');

        // Then I should be logged out.
        $this->dontSeeIsAuthenticated();
    }
}
