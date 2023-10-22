<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ListRoles extends Command
{
    protected $signature = 'role:list';
    protected $description = 'List all roles';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $roles = ["admin", "editor", "user"]; // Remplacez ceci par vos rôles réels

        $this->info("Roles available:");
        foreach ($roles as $role) {
            $this->line("- $role");
        }
    }
}
