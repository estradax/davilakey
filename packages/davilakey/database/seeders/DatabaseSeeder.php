<?php

namespace Database\Seeders;

use App\Models\Robot;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RobotSeeder::class,
            CategorySeeder::class
        ]);

        $robots = Robot::all();
        $robots->map(function (Robot $robot) {
            $robot->categories()->attach(rand(1, 3));
        });
    }
}
