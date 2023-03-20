<?php

namespace Database\Seeders;

use App\Models\Robot;
use App\Models\RobotSpec;
use App\Models\RobotSubImage;
use Illuminate\Database\Seeder;

class RobotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $robots = Robot::factory(30)->create();

        $robots->map(function (Robot $robot) {
            $robot->specs()->saveMany(RobotSpec::factory(rand(3, 4))->make());
            $robot->subImages()->saveMany(RobotSubImage::factory(rand(3, 4))->make());
        });
    }
}
