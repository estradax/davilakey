<?php

namespace Database\Seeders;

use App\Models\Robot;
use Illuminate\Database\Seeder;

class RobotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Robot::factory(30)->create();
    }
}
