<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    use RefreshDatabase;

    public $seed = true;

    public function test_authorize_user_can_see_permission_page()
    {
        $response = $this->actingAs($this->superAdmin)->get('/permissions');

        $response->assertStatus(200);
    }

    public function test_unauthorize_user_cannot_see_permission_page()
    {
        $response = $this->get('/permissions');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }


    public function test_create_new_permission_successfully()
    {
        $response = $this->actingAs($this->superAdmin)->post('/permissions', [
            'name' => 'create',
            'module_name' => 'commercial'
        ]);

        $response->assertStatus(302);

        $response->assertRedirectToRoute('permissions.index');
    }


    public function test_cannot_create_new_permission_without_name_modulename()
    {
        $response = $this->actingAs($this->superAdmin)->post('/permissions', [
            'name' => '',
            'module_name' => ''
        ]);

        $response->assertSessionHasErrors(['name', 'module_name']);
        $response->assertStatus(302);

    }

   public function test_can_delete_permission_successfully()
   {

       $permission  = Permission::findById(1);

       $response = $this->actingAs($this->superAdmin)->delete(route('permissions.destroy', $permission));

       $response->assertStatus(302);

       $response->assertRedirect('/permissions');
   }


}
