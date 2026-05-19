<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Tests\TestCase;
use Mockery;

class AuthFeatureTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Uji Halaman Utama mengembalikan status HTTP 200 (OK)
     */
    public function test_homepage_returns_http_200()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * Uji Dashboard mengalihkan pengguna yang belum login ke halaman Login (HTTP 302)
     */
    public function test_unauthenticated_user_redirects_to_login_http_302()
    {
        $response = $this->get('/dashboard');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    /**
     * Uji Dashboard mengembalikan status HTTP 200 untuk pengguna yang sudah login
     */
    public function test_authenticated_user_accesses_dashboard_http_200()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertStatus(200);
    }

    public function test_login_requires_recaptcha()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password',
            // Missing g-recaptcha-response
        ]);

        $response->assertSessionHasErrors('g-recaptcha-response');
        $this->assertGuest();
    }

    public function test_register_requires_recaptcha()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test2@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            // Missing g-recaptcha-response
        ]);

        $response->assertSessionHasErrors('g-recaptcha-response');
        $this->assertGuest();
    }

    public function test_google_login_redirect()
    {
        $response = $this->get('/auth/google');
        $response->assertRedirectContains('accounts.google.com');
    }

    public function test_google_login_callback()
    {
        $abstractUser = Mockery::mock('Laravel\Socialite\Two\User');
        $abstractUser->shouldReceive('getId')
            ->andReturn('123456789')
            ->shouldReceive('getName')
            ->andReturn('Google User')
            ->shouldReceive('getEmail')
            ->andReturn('googleuser@example.com');
            
        $abstractUser->id = '123456789';
        $abstractUser->name = 'Google User';
        $abstractUser->email = 'googleuser@example.com';

        Socialite::shouldReceive('driver->user')->andReturn($abstractUser);

        $response = $this->get('/auth/google/callback');

        $this->assertDatabaseHas('users', [
            'email' => 'googleuser@example.com',
            'google_id' => '123456789',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));
    }
}
