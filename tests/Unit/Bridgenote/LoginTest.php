<?php

namespace Tests\Unit\Bridgenote;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_login_and_logout()
    {
        // Register new User
        $user = User::factory()->create();

        // visit login page
        $this->get('/login');

        // Submiting login form
        $login = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        //Assert that a user is authenticated:
        $this->assertAuthenticated();

        //redirect to dashboard
        $login->assertRedirect(RouteServiceProvider::HOME);

        //post logout
        $this->post('/logout');

        //redirect back to dashboard
        $this->get(RouteServiceProvider::HOME);

        //redirect to login page
        $this->get('/login');

    }

}
