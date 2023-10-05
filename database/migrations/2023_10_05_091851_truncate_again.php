<?php

use App\Models\Page;
use App\Models\SousMenu;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('sous_menus', function (Blueprint $table) {
            SousMenu::truncate();
        });

        Schema::table('pages', function (Blueprint $table) {
            Page::truncate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
