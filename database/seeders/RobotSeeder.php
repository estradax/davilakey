<?php

namespace Database\Seeders;

use App\Models\Robot;
use CloudinaryLabs\CloudinaryLaravel\Model\Media;
use Illuminate\Database\Seeder;

class RobotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $robots = Robot::factory(5)->create();
        $robots->each(function (Robot $robot) {
            $media = new Media();
            $media->file_name = 'mech-mind2_qjrvfz';
            $media->file_url = 'https://res.cloudinary.com/dgo3pwr4r/image/upload/v1683590750/mech-mind2_qjrvfz.jpg';
            $media->size = 69420;

            $robot->medially()->save($media);
        });
    }
}
