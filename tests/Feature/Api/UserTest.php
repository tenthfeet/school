<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public bool $seed = true;

    public function test_authorize_user_can_see_users_list()
    {
        $user = User::where('id', '1')->first();

        $response = $this->actingAs($user, 'sanctum')
            ->get('/api/users');

        $response->assertOk();
    }

    public function test_create_new_user_successfully()
    {
        $user = User::where('id', '1')->first();

        $role = Role::create([
            'name' => 'rolename',
            'guard_name' => 'sanctum',
        ]);

        $response = $this->actingAs($user, 'sanctum')
            ->post('/api/users', [
                'name' => 'Md. Sukel Ali',
                'email' => 'sukelali@gmail.com',
                'password' => "12345678",
                'password_confirmation' => "12345678",
                'email_verified_at' => now(),
                'role' => $role->id
            ]);

        $response->assertCreated();
    }

    public function test_cannot_create_new_user_without_required_fields()
    {
        $response = $this->actingAs($this->superAdmin)
            ->post('/api/users/', [
                'name' => '',
                'email' => '',
                'password' => '',
                'role' => '',
            ]);

        $response->assertInvalid([
            'name',
            'email',
            'password',
            'role',
        ]);
    }

    public function test_authorize_user_can_see_a_single_user()
    {
        $user = User::where('id', '1')->first();

        $response = $this->actingAs($user, 'sanctum')
            ->get('/api/users/'.$user->id);

        $response->assertOk();
    }

    public function test_update_user_successfully()
    {
        $user = User::where('id', '1')->first();

        $response = $this->actingAs($user, 'sanctum')
            ->put('/api/users/'.$user->id, [
                'name' => 'updated user',
                'email' => 'sukelali@gmail.com',
                'role' => '3'
            ]);

        $response->assertOk();
    }

    public function test_cannot_update_permission_without_required_field()
    {
        $user = User::where('id', '1')->first();

        $response = $this->actingAs($user, 'sanctum')
            ->put('/api/users/'.$user->id, [
                'name' => '',
            ]);

        $response->assertUnprocessable();
    }

    public function test_authorize_user_can_delete_user()
    {
        $user = User::latest()->firstOrFail();

        $response = $this->actingAs($user, 'sanctum')
            ->delete('/api/users/'.$user->id);

        $response->assertNoContent();
    }
}
