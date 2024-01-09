<?php

namespace Tests\Feature;

use App\Http\Controllers\MenuController;
use App\Http\Repositories\MenuRepository;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Silber\Bouncer\BouncerFacade as Bouncer;
use Tests\TestCase;

class MenuTest extends TestCase
{
    use RefreshDatabase;


    /* --User Without Abilities-- */
    public function test_random_user_can_view_menu_index() : void
    {
        $response = $this
            ->get('/menu');

        $response->assertStatus(200);
        $response->assertViewIs('menu.index');
    }

    public function test_user_without_role_can_view_menu_index() : void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $response = $this
            ->actingAs($user)
            ->get('/menu');


        $response->assertStatus(200);
        $response->assertViewIs('menu.index');
    }

    public function test_user_without_role_cant_create_menu() : void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $response = $this
            ->actingAs($user)
            ->get('/menu/create');

        $response->assertStatus(401);
    }

    public function test_user_without_role_cant_view_menu_show() : void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $menu = Menu::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get("/menu/{$menu->id}");

        $response->assertStatus(401);
    }

    public function test_user_without_role_cant_edit_menu() : void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $menu = Menu::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get("/menu/{$menu->id}/edit");

        $response->assertStatus(401);
    }

    public function test_user_without_role_cant_delete_menu() : void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $menu = Menu::factory()->create();

        $response = $this
            ->actingAs($user)
            ->delete("/menu/{$menu->id}");

        $response->assertStatus(401);
    }


    /* --User With Abilities-- */
    public function test_user_with_admin_role_can_create_menu() : void
    {
        $user = User::factory()->create();
        Bouncer::assign('admin')->to($user);
        Bouncer::allow('admin')->to('menu-create');
        Bouncer::refresh();

        $response = $this
            ->actingAs($user)
            ->get('/menu/create');

        $response->assertStatus(200);
    }


    public function test_user_with_admin_role_can_store_menu() : void
    {
        $user = User::factory()->create();
        Bouncer::assign('admin')->to($user);
        Bouncer::allow('admin')->to('menu-edit');
        Bouncer::refresh();

        $response = $this
            ->actingAs($user)
            ->post("/menu", [
                'titre' => 'Test update',
                'lien' => 'update link',
                'afficher' => '1',
            ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/menu');
    }


    public function test_user_with_admin_role_can_view_menu_show() : void
    {
        $user = User::factory()->create();
        Bouncer::assign('admin')->to($user);
        Bouncer::allow('admin')->to('menu-show');
        Bouncer::refresh();

        $menu = Menu::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get("/menu/{$menu->id}");

        $response->assertStatus(200);
    }

    public function test_user_with_admin_role_can_edit_menu() : void
    {
        $user = User::factory()->create();
        Bouncer::assign('admin')->to($user);
        Bouncer::allow('admin')->to('menu-edit');
        Bouncer::refresh();

        $menu = Menu::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get("/menu/{$menu->id}/edit");

        $response->assertStatus(200);
    }

    public function test_user_with_admin_role_can_update_menu() : void
    {
        $user = User::factory()->create();
        Bouncer::assign('admin')->to($user);
        Bouncer::allow('admin')->to('menu-edit');
        Bouncer::refresh();

        $menu = Menu::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch("/menu/{$menu->id}", [
                'titre' => 'Test update',
                'lien' => 'update link',
                'afficher' => '1',
            ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/menu');
    }


    public function test_user_with_admin_role_can_delete_menu() : void
    {
        $user = User::factory()->create();
        Bouncer::assign('admin')->to($user);
        Bouncer::allow('admin')->to('menu-delete');
        Bouncer::refresh();

        $menu = Menu::factory()->create();

        $this->assertDatabaseHas('menus', ['id' => $menu->id]);

        $response = $this
            ->actingAs($user)
            ->delete("/menu/{$menu->id}");

        $response->assertRedirect('/menu');

        $this->assertDatabaseMissing('menus', ['id' => $menu->id]);

    }
}

