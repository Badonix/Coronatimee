<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_user_can_logout()
    {
        $email = "test@redberry.ge";
        $username = "USER1049";
        $password = '1234';

        $user = new User();
        $user->username = $username;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->save();

        $this->actingAs($user);

        $response = $this->get('/logout');

        $response->assertRedirect('/login');

        $this->assertGuest();
    }
}
