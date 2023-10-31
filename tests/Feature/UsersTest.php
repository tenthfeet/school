<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use RefreshDatabase;

    public $seed = true;

    public function test_user_index_page_cannot_load_without_login()
    {
        $response = $this->get('/users');

        $response->assertStatus(302);
        $response->assertRedirectToRoute('login');
    }

    public function test_user_index_page_can_access_as_super_admin()
    {

        $response = $this->actingAs($this->superAdmin)->get('/users');

        $response->assertStatus(200);
        $response->assertViewHas('users');
    }

    public function test_user_index_page_can_access_as_admin()
    {

        $response = $this->actingAs($this->admin)->get('/users');

        $response->assertStatus(200);
        $response->assertViewHas('users');
    }

    public function test_user_index_page_can_access_as_user()
    {
        $response = $this->actingAs($this->user)->get('/users');

        $response->assertStatus(200);
        $response->assertViewHas('users');
    }

    public function test_user_show_page_can_access_as_user()
    {

        $newUser = User::factory(1)->create()->first();

        $response = $this->actingAs($this->user)->get(route('users.show', $newUser));

        $response->assertStatus(200);
        $response->assertViewHas('user', $newUser);
    }

    public function test_user_create_page_cannot_access_as_user()
    {
        $response = $this->actingAs($this->user)->get(route('users.create'));

        $response->assertStatus(403);
    }

    public function test_user_create_page_can_access_as_super_admin()
    {
        $response = $this->actingAs($this->superAdmin)->get(route('users.create'));

        $response->assertStatus(200);
    }

    public function test_user_store_as_super_admin()
    {
        $user = [
            'name' => 'Riaz Uddin Khan',
            'email' => 'riaz@gmail.com',
            'password' => 'password123',
            'role' => Role::find(3)->id,
        ];

        $response = $this->actingAs($this->superAdmin)
            ->post(route('users.store', $user));

        $response->assertStatus(302);
    }


    public function test_user_store_validation_errors_as_super_admin()
    {
        $user = [
            'name' => '',
            'email' => '',
            'password' => '',
            'role' => '',
        ];

        $response = $this->actingAs($this->superAdmin)
            ->post(route('users.store', $user));

        $response->assertInvalid(['name', 'email', 'password', 'role']);
    }

    /**
     * @return void
     */
    public function test_user_search(): void
    {
        $user = User::where('email', 'user@dashcode.com')->firstOrFail();

        $response = $this->actingAs($this->superAdmin)
            ->get(route('users.index', ['q' => $user->email]));

        $response->assertSee($user->email);
    }

    public function test_user_update(){
        $user = User::where('email', 'user@dashcode.com')->firstOrFail();


        $response = $this->actingAs($this->superAdmin)->put(route('users.update', $user),    [
            'name' => 'Edit User',
            'email' => $user->email,
            'role' => '3',
        ]);

        $editedUser = User::where('email', 'user@dashcode.com')->firstOrFail();

        $this->assertEquals('Edit User', $editedUser->name);
    }

    public function test_user_delete_as_super_admin(){
        $user = User::factory(1)->create()->first();

        $response = $this->actingAs($this->superAdmin)
            ->delete(route('users.destroy', $user));

        $response->assertStatus(302);
        $response->assertRedirect('users');
        $this->assertDatabaseMissing('users', $user->toArray());
        $this->assertModelMissing($user);
    }


}
