<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\RolesAndPermissionsSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->withPersonalTeam()->create();

<<<<<<< HEAD
        User::factory()->withPersonalTeam()->create([
=======
        $this->call(RolesAndPermissionsSeeder::class);

        $user = User::factory()->create([
>>>>>>> codex/install-spatie/laravel-permission-and-seed-roles
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $user->assignRole('admin');
    }
}
