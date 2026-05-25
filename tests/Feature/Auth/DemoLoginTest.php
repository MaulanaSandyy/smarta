<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DemoLoginTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed([
            \Database\Seeders\UserSeeder::class,
            \Database\Seeders\RoleSeeder::class,
        ]);
    }

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_demo_login_as_rt(): void
    {
        $response = $this->post(route('demo-login'), [
            'role' => 'rt',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('pilih-sistem'));
        $this->assertNotNull(session('smarta_user'));
    }

    public function test_demo_login_as_masjid(): void
    {
        $response = $this->post(route('demo-login'), [
            'role' => 'masjid',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('pilih-sistem'));
        $this->assertNotNull(session('smarta_user'));
    }

    public function test_demo_login_as_super_admin(): void
    {
        $response = $this->post(route('demo-login'), [
            'role' => 'super-admin',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('pilih-sistem'));
        $this->assertNotNull(session('smarta_user'));
    }

    public function test_demo_login_defaults_to_rt(): void
    {
        $response = $this->post(route('demo-login'), [
            'role' => 'unknown-role',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('pilih-sistem'));
        $this->assertNotNull(session('smarta_user'));
    }

    public function test_pilih_sistem_page_can_be_accessed_by_anyone(): void
    {
        $response = $this->get(route('pilih-sistem'));

        $response->assertOk();
    }
}
