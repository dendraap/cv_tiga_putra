<?php

namespace Tests\Feature;

use App\Models\roles;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RolesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
     // Testing Views
     public function test_login_view_can_be_rendered(): void
     {
         $view = $this->view('layouts.app', ['title' => __(' | CV Tiga Putra'), 'activePage' => 'login']);

         $view->assertSee('login');
     }

     public function test_admin_can_access_roles()
     {
         $admin = User::first();

         $response = $this->actingAs($admin)->get('/roles');
         $response->assertStatus(200);
     }

    public function test_create_role_successful()
    {
         $data = [
             'name' => 'Testing POST',
             'description' => 'Testing POST'
         ];

         $admin = User::first();

         $response = $this->actingAs($admin)->post(route('roles.store', $data));

         $response->assertStatus(302);
         $response->assertRedirect('roles');

         $this->assertDatabaseHas('roles', $data);
    }

     public function test_admin_can_edit_roles_page()
     {
         $admin = User::first();
         $roles = Roles::create([
             'name' => 'Edited Testing Role',
             'description' => 'Edited Testing Role'
         ]);

         $this->withoutExceptionHandling();
         $response = $this->withViewErrors([])->actingAs($admin)->get('/roles/'. $roles->id.'/edit');
         $response->assertStatus(200);
     }

     public function test_update_role_successful()
     {
         $roles = Roles::factory()->create();

         $data = [
             'name' => 'Updated Testing Role',
             'description' => 'UpdatedTesting Testing Role'
         ];

         $admin = User::first();
         $response = $this->actingAs($admin)->put(route('roles.update', ['role' => $roles],$data));

         $response->assertStatus(302);
         $roles->refresh();
         $this->assertEquals('Laravel Testing', $roles->name);
         $this->assertEquals('Laravel Testing', $roles->description);
     }

     public function test_delete_role_successful()
     {
         $roles = Roles::factory()->create();

         $admin = User::first();
         $this->withoutExceptionHandling();
         $response = $this->actingAs($admin)->delete(route('roles.destroy', $roles));


         $response->assertStatus(302);
         $response->assertRedirect('roles');
         // $this->assertDeleted('roles', $roles->toArray());
     }
}
