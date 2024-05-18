<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\TeamUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $team = Team::factory()->create([
            'name' => 'Team A',
        ]);

        User::factory()->create([
            'email' => 'login@nova.com',
        ]);

        TeamUser::factory()->create([
            'team_id' => $team,
            'role' => 'admin',
        ]);

        TeamUser::factory(5)->create([
            'team_id' => $team,
        ]);

        User::factory(5)->create();
    }
}
