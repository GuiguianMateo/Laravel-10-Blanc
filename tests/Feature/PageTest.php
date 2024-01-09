<?php

namespace Tests\Feature;


use App\Models\Page;
use App\Models\SousMenu;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Silber\Bouncer\BouncerFacade as Bouncer;
use Tests\TestCase;

class PageTest extends TestCase
{
    use RefreshDatabase;


    /* --User Without Abilities-- */
    public function test_random_user_can_view_page_index() : void
    {
        $response = $this
            ->get('/page');

        $response->assertStatus(200);
        $response->assertViewIs('page.index');
    }

    public function test_user_without_role_can_view_page_index() : void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $response = $this
            ->actingAs($user)
            ->get('/page');


        $response->assertStatus(200);
        $response->assertViewIs('page.index');
    }

    public function test_user_without_role_cant_create_page() : void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $response = $this
            ->actingAs($user)
            ->get('/page/create');

        $response->assertStatus(401);
    }

    public function test_user_without_role_cant_view_page_show() : void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $page = Page::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get("/page/{$page->id}");

        $response->assertStatus(401);
    }

    public function test_user_without_role_cant_edit_page() : void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $page = Page::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get("/page/{$page->id}/edit");

        $response->assertStatus(401);
    }

    public function test_user_without_role_cant_delete_page() : void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $page = Page::factory()->create();

        $response = $this
            ->actingAs($user)
            ->delete("/page/{$page->id}");

        $response->assertStatus(401);
    }


    /* --User With Abilities-- */
    public function test_user_with_editor_role_can_create_page() : void
    {
        $user = User::factory()->create();
        Bouncer::assign('editor')->to($user);
        Bouncer::allow('editor')->to('page-create');
        Bouncer::refresh();

        $response = $this
            ->actingAs($user)
            ->get('/page/create');

        $response->assertStatus(200);
    }


    public function test_user_with_editor_role_can_store_page() : void
    {
        $user = User::factory()->create();
        Bouncer::assign('editor')->to($user);
        Bouncer::allow('editor')->to('page-edit');
        Bouncer::refresh();

        $sousmenu = SousMenu::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post("/page", [
                'titre' => 'Test update',
                'message' => 'update link',
                'publier' => '1',
                'sousmenu_id' => "{$sousmenu->id}",
            ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/page');
    }


    public function test_user_with_editor_role_can_view_page_show() : void
    {
        $user = User::factory()->create();
        Bouncer::assign('editor')->to($user);
        Bouncer::allow('editor')->to('page-show');
        Bouncer::refresh();

        $page = Page::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get("/page/{$page->id}");

        $response->assertStatus(200);
    }

    public function test_user_with_editor_role_can_edit_page() : void
    {
        $user = User::factory()->create();
        Bouncer::assign('editor')->to($user);
        Bouncer::allow('editor')->to('page-edit');
        Bouncer::refresh();

        $page = Page::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get("/page/{$page->id}/edit");

        $response->assertStatus(200);
    }

    public function test_user_with_editor_role_can_update_page() : void
    {
        $user = User::factory()->create();
        Bouncer::assign('editor')->to($user);
        Bouncer::allow('editor')->to('page-edit');
        Bouncer::refresh();

        $sousmenu = SousMenu::factory()->create();
        $page = Page::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch("/page/{$page->id}", [
                'titre' => 'Test update',
                'message' => 'update link',
                'publier' => '1',
                'sousmenu_id' => "{$sousmenu->id}",
            ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/page');
    }


    public function test_user_with_editor_role_can_delete_page() : void
    {
        $user = User::factory()->create();
        Bouncer::assign('editor')->to($user);
        Bouncer::allow('editor')->to('page-delete');
        Bouncer::refresh();

        $page = Page::factory()->create();

        $this->assertDatabaseHas('pages', ['id' => $page->id]);

        $response = $this
            ->actingAs($user)
            ->delete("/page/{$page->id}");

        $response->assertRedirect('/page');

        $this->assertDatabaseMissing('pages', ['id' => $page->id]);

    }
}

