<?php

namespace GymForGym\Test\Functional\Auth;

use GymForGym\User;
use TestCase;

class RegistrationTest extends TestCase
{
    /**
     * Should be able to register for an account.
     */
    public function testCanRegister()
    {
        // When I go to the registration form;
        $this->visit(route('register'));

        // And I fill it in;
        $email = "{$this->uniqid()}@{$this->faker()->safeEmailDomain}";
        $this->type($email, 'email')
            ->type('secret123', 'password')
            ->type('secret123', 'password_confirmation')
            ->press('Register');

        // Then I should have an account.
        $this->seeIsAuthenticated();
        $this->assertEquals(
            1,
            User::where('email', $email)->count(),
            'New user should be registered.'
        );
    }
}
