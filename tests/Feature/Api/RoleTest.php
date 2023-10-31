<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    public $seed = true;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_authorize_user_can_see_roles_list()
    {
        $user = User::where('id', '1')->first();

        $response = $this->actingAs($user, 'sanctum')->get('/api/roles');

        $response->assertOk();
    }

    public function test_create_new_role_successfully()
    {
        $user = User::where('id', '1')->first();

        $response = $this->actingAs($user, 'sanctum')->post('/api/roles', [
            'name' => 'commercial',
            'permissions' => [1,2],
        ]);

        $response->assertCreated();
    }

    public function test_cannot_create_new_role_without_name()
    {
        $user = User::where('id', '1')->first();

        $response = $this->actingAs($user, 'sanctum')->post('/api/roles', [
            'name' => ''
        ]);

        $response->assertUnprocessable();
    }

    public function test_authorize_user_can_see_a_single_role()
    {
        $user = User::where('id', '1')->first();
        $role = Role::all()->firstOrFail();

        $response = $this->actingAs($user, 'sanctum')->get('/api/roles/'.$role->id);

        $response->assertOk();
    }

    public function test_update_role_successfully()
    {
        $user = User::where('id', '1')->first();

        $role = Role::where('id', 1)->first();

        $response = $this->actingAs($user, 'sanctum')->put('/api/roles/'.$role->id, [
            'name' => 'updated_role',
        ]);

        $response->assertOk();
    }

    public function test_cannot_update_role_without_name()
    {
        $user = User::where('id', '1')->first();

        $role = Role::where('id', 1)->first();

        $response = $this->actingAs($user, 'sanctum')->put('/api/roles/'.$role->id, [
            'name' => ''
        ]);

        $response->assertUnprocessable();
    }

    public function test_authorize_user_can_delete_role()
    {
        $user = User::where('id', 1)->first();

        $role = Role::where('id', 1)->first();

        $response = $this->actingAs($user, 'sanctum')->delete('/api/roles/'.$role->id);

        $response->assertNoContent();
    }
}
