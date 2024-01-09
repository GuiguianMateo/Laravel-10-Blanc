<?php

namespace Tests\Feature;

use App\Models\Menu;
use App\Models\SousMenu;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Silber\Bouncer\BouncerFacade as Bouncer;
use Tests\TestCase;

class SousMenuTest extends TestCase
{
    use RefreshDatabase;


    /* --User Without Abilities-- */
    public function test_random_user_can_view_sousmenu_index() : void
    {
        $response = $this
            ->get('/sousmenu');

        $response->assertStatus(200);
        $response->assertViewIs('sousmenu.index');
    }

    public function test_user_without_role_can_view_sousmenu_index() : void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $response = $this
            ->actingAs($user)
            ->get('/sousmenu');


        $response->assertStatus(200);
        $response->assertViewIs('sousmenu.index');
    }

    public function test_user_without_role_cant_create_sousmenu() : void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $response = $this
            ->actingAs($user)
            ->get('/sousmenu/create');

        $response->assertStatus(401);
    }

    public function test_user_without_role_cant_view_sousmenu_show() : void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $sousmenu = SousMenu::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get("/sousmenu/{$sousmenu->id}");

        $response->assertStatus(401);
    }

    public function test_user_without_role_cant_edit_sousmenu() : void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $sousmenu = SousMenu::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get("/sousmenu/{$sousmenu->id}/edit");

        $response->assertStatus(401);
    }

    public function test_user_without_role_cant_delete_sousmenu() : void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $sousmenu = SousMenu::factory()->create();

        $response = $this
            ->actingAs($user)
            ->delete("/sousmenu/{$sousmenu->id}");

        $response->assertStatus(401);
    }


    /* --User With Abilities-- */
    public function test_user_with_admin_role_can_create_sousmenu() : void
    {
        $user = User::factory()->create();
        Bouncer::assign('admin')->to($user);
        Bouncer::allow('admin')->to('sousmenu-create');
        Bouncer::refresh();

        $response = $this
            ->actingAs($user)
            ->get('/sousmenu/create');

        $response->assertStatus(200);
    }


    public function test_user_with_admin_role_can_store_sousmenu() : void
    {
        $user = User::factory()->create();
        Bouncer::assign('admin')->to($user);
        Bouncer::allow('admin')->to('sousmenu-edit');
        Bouncer::refresh();

        $menu = Menu::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post("/sousmenu", [
                'titre' => 'Test update',
                'lien' => 'update link',
                'afficher' => '1',
                'menu_id' => "{$menu->id}",
            ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/sousmenu');
    }


    public function test_user_with_admin_role_can_view_sousmenu_show() : void
    {
        $user = User::factory()->create();
        Bouncer::assign('admin')->to($user);
        Bouncer::allow('admin')->to('sousmenu-show');
        Bouncer::refresh();

        $sousmenu = SousMenu::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get("/sousmenu/{$sousmenu->id}");

        $response->assertStatus(200);
    }

    public function test_user_with_admin_role_can_edit_sousmenu() : void
    {
        $user = User::factory()->create();
        Bouncer::assign('admin')->to($user);
        Bouncer::allow('admin')->to('sousmenu-edit');
        Bouncer::refresh();

        $sousmenu = SousMenu::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get("/sousmenu/{$sousmenu->id}/edit");

        $response->assertStatus(200);
    }

    public function test_user_with_admin_role_can_update_sousmenu() : void
    {
        $user = User::factory()->create();
        Bouncer::assign('admin')->to($user);
        Bouncer::allow('admin')->to('sousmenu-edit');
        Bouncer::refresh();

        $menu = Menu::factory()->create();
        $sousmenu = SousMenu::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch("/sousmenu/{$sousmenu->id}", [
                'titre' => 'Test update',
                'lien' => 'update link',
                'afficher' => '1',
                'menu_id' => "{$menu->id}",
            ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/sousmenu');
    }


    public function test_user_with_admin_role_can_delete_sousmenu() : void
    {
        $user = User::factory()->create();
        Bouncer::assign('admin')->to($user);
        Bouncer::allow('admin')->to('sousmenu-delete');
        Bouncer::refresh();

        $sousmenu = SousMenu::factory()->create();

        $this->assertDatabaseHas('sous_menus', ['id' => $sousmenu->id]);

        $response = $this
            ->actingAs($user)
            ->delete("/sousmenu/{$sousmenu->id}");

        $response->assertRedirect('/sousmenu');

        $this->assertDatabaseMissing('sous_menus', ['id' => $sousmenu->id]);

    }
}

