<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    use RefreshDatabase;

    public $seed = true;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_authorize_user_can_see_permission_list()
    {
        $user = User::where('id', '1')->first();

        $response = $this->actingAs($user, 'sanctum')->get('/api/permissions');

        $response->assertOk();
    }

    public function test_create_new_permission_successfully()
    {
        $user = User::where('id', '1')->first();

        $response = $this->actingAs($user, 'sanctum')->post('/api/permissions', [
            'name' => 'create',
            'module_name' => 'commercial'
        ]);

        $response->assertCreated();
    }

    public function test_cannot_create_new_permission_without_name_or_modulename()
    {
        $user = User::where('id', '1')->first();

        $response = $this->actingAs($user, 'sanctum')->post('/api/permissions', [
            'name' => '',
            'module_name' => ''
        ]);

        $response->assertUnprocessable();
    }

    public function test_authorize_user_can_see_a_single_permission()
    {
        $user = User::where('id', '1')->first();
        $permission = Permission::all()->firstOrFail();

        $response = $this->actingAs($user, 'sanctum')->get('/api/permissions/'.$permission->id);

        $response->assertOk();
    }

    public function test_update_permission_successfully()
    {
        $user = User::where('id', '1')->first();

        $permission = Permission::where('module_name','role')->first();

        $response = $this->actingAs($user, 'sanctum')->put('/api/permissions/'.$permission->id, [
            'name' => 'create_updated',
            'module_name' => 'role'
        ]);

        $response->assertOk();
    }

    public function test_cannot_update_permission_without_name_or_modulename()
    {
        $user = User::where('id', '1')->first();

        $permission = Permission::where('module_name','role')->first();

        $response = $this->actingAs($user, 'sanctum')->put('/api/permissions/'.$permission->id, [
            'name' => '',
            'module_name' => 'role'
        ]);

        $response->assertUnprocessable();
    }

    public function test_authorize_user_can_delete_permission()
    {
        $user = User::where('id', '1')->first();

        $permission = Permission::where('module_name','role')->first();

        $response = $this->actingAs($user, 'sanctum')->delete('/api/permissions/'.$permission->id);

        $response->assertNoContent();
    }


}
