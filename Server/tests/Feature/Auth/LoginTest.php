<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Models\Hospital;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_login_with_valid_credentials_and_hospital_association()
    {
        // Create a hospital
        $hospital = Hospital::factory()->create();
        
        // Create a user with a password and associate with the hospital
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
            'status' => true,
        ]);
        
        // Attach the hospital to the user
        $user->hospitals()->attach($hospital->id);

        // Attempt to login
        $response = $this->postJson('/api/login', [
            'identifier' => 'test@example.com',
            'password' => 'password123',
        ]);

        // Assert the response
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'message',
            'user' => [
                'id',
                'email',
            ],
            'authorisation' => [
                'type',
                'token',
            ]
        ]);
    }

    /** @test */
    public function user_cannot_login_without_hospital_association()
    {
        // Create a user without hospital association
        $user = User::factory()->create([
            'email' => 'nohospital@example.com',
            'password' => Hash::make('password123'),
            'status' => true,
        ]);

        // Attempt to login
        $response = $this->postJson('/api/login', [
            'identifier' => 'nohospital@example.com',
            'password' => 'password123',
        ]);

        // Assert the response
        $response->assertStatus(403);
        $response->assertJson([
            'message' => 'Sorry, your account is not associated with any hospital. Please contact your administrator.'
        ]);
    }

    /** @test */
    public function user_cannot_login_with_invalid_credentials()
    {
        // Attempt to login with invalid credentials
        $response = $this->postJson('/api/login', [
            'identifier' => 'nonexistent@example.com',
            'password' => 'wrongpassword',
        ]);

        // Assert the response
        $response->assertStatus(401);
        $response->assertJson([
            'message' => 'Sorry Wrong Email or Password'
        ]);
    }

    /** @test */
    public function inactive_user_cannot_login()
    {
        // Create an inactive user
        $user = User::factory()->create([
            'email' => 'inactive@example.com',
            'password' => Hash::make('password123'),
            'status' => false,
        ]);

        // Attempt to login
        $response = $this->postJson('/api/login', [
            'identifier' => 'inactive@example.com',
            'password' => 'password123',
        ]);

        // Assert the response
        $response->assertStatus(403);
        $response->assertJson([
            'message' => 'Sorry your account has not been activated yet. Please contact your administrator.'
        ]);
    }
}
