<?php

namespace Tests\Feature\Http\Controllers\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\User;

class LoginControllerTest extends TestCase
{
  use RefreshDatabase;

  public function setUp(): void
  {
    parent::setUp();
    $this->artisan('passport:install');
  }

  /** @test */
  public function can_authenticate()
  {
    // Given - user is authenticated
    $user = factory(User::class)->create([
        'password' => bcrypt($password = 'i-love-laravel'),
    ]);

    // When - posting request login
    $response = $this->json('POST', '/api/auth/login', [
      'email' => $user->email,
      'password' => $password
    ]);

    // Then - check access_token exists and 200 success code
    $response->assertStatus(200)->assertJsonStructure(['access_token']);
  }

}
