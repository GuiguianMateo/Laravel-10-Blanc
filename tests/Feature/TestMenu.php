<?php

namespace Tests\Feature;

use App\Models\Menu;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestMenu extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_menu()
    {
/*         $this->actingAsAdmin(); */

        $response = $this->post('/menus', [
            'titre' => 'Nouveau Menu',
            'lien' => '/nouveau-menu',
            'afficher' => true,
        ]);

        $response->assertStatus(302); // Vérifie que la création renvoie une redirection (statut 302)
        $this->assertDatabaseHas('menus', ['titre' => 'Nouveau Menu']);
    }

    public function test_admin_can_view_menu()
    {
        $menu = Menu::factory()->create(); // Crée un menu pour le tester

        $response = $this->get("/menus/{$menu->id}");

        $response->assertStatus(200); // Vérifie que la page de visualisation renvoie un statut 200 (OK)
    }

    public function test_admin_can_update_menu()
    {
        $menu = Menu::factory()->create(); // Crée un menu pour le tester

        $response = $this->put("/menus/{$menu->id}", [
            'titre' => 'Menu Mis à Jour',
            'lien' => '/menu-mis-a-jour',
            'afficher' => false,
        ]);

        $response->assertStatus(302); // Vérifie que la modification renvoie une redirection (statut 302)
        $this->assertDatabaseHas('menus', ['titre' => 'Menu Mis à Jour']);
    }

    public function test_admin_can_delete_menu()
    {
        $menu = Menu::factory()->create(); // Crée un menu pour le tester

        $response = $this->delete("/menus/{$menu->id}");

        $response->assertStatus(302); // Vérifie que la suppression renvoie une redirection (statut 302)
        $this->assertDatabaseMissing('menus', ['id' => $menu->id]);
    }
}
