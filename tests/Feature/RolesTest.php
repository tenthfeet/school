<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RolesTest extends TestCase
{
    use RefreshDatabase;

    public $seed = true;

    public function test_unauthorized_access_prevent_roles_index_pages()
    {
        $response = $this->actingAs($this->user)
            ->get(route('roles.index'));
        $response->assertStatus(403);
    }

    public function test_unauthorized_access_prevent_roles_show_pages()
    {
        $response = $this->actingAs($this->user)
            ->get(route('roles.show', 1));
        $response->assertStatus(403);
    }

    public function test_unauthorized_access_prevent_roles_create_pages()
    {
        $response = $this->actingAs($this->user)
            ->get(route('roles.create'));
        $response->assertStatus(403);
    }

    public function test_unauthorized_access_prevent_roles_edit_pages()
    {
        $response = $this->actingAs($this->user)
            ->get(route('roles.edit', 1));
        $response->assertStatus(403);
    }

    public function test_role_create()
    {
        $role = [
            'name' => 'viewer',
            'permissions' => [1,2,3],
        ];

        $response = $this->actingAs($this->superAdmin)
            ->post(route('roles.store', $role));

        $response->assertStatus(302);
        $this->assertDatabaseHas('roles', ['name' => $role['name']]);
    }


    public function test_role_edit()
    {

        $role = Role::create([
            'name' => 'viewer'
        ]);

        $response = $this->actingAs($this->superAdmin)
            ->put(route('roles.update', $role), [
                'name' => 'viewer-edit'
            ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('roles', [
            'name' => 'viewer-edit'
        ]);
    }

    public function test_role_delete()
    {
        $role = Role::create([
            'name' => 'viewer'
        ]);

        $response = $this->actingAs($this->superAdmin)
            ->delete(route('roles.destroy', $role));

        $response->assertStatus(302);
        $this->assertDatabaseMissing('roles', [
            'name' => 'viewer'
        ]);
    }
}
