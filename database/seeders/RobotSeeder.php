<?php

namespace Database\Seeders;

use App\Models\Robot;
use CloudinaryLabs\CloudinaryLaravel\Model\Media;
use Illuminate\Database\Seeder;

class RobotSeeder extends Seeder
{
    protected const MAIN_IMAGE_FILENAME = 'mech-mind2_qjrvfz';
    protected const MAIN_IMAGE_URL = 'https://res.cloudinary.com/dgo3pwr4r/image/upload/v1683590750/mech-mind2_qjrvfz.jpg';
    protected const SUB_IMAGE_FILENAME = 'maximalfocus-0n4jhVGS4zs-unsplash_oa1hwt';
    protected const SUB_IMAGE_URL = 'https://res.cloudinary.com/dgo3pwr4r/image/upload/v1683700533/maximalfocus-0n4jhVGS4zs-unsplash_oa1hwt.jpg';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $robots = Robot::factory(5)->create();
        $robots->each(function (Robot $robot) {
            $totalSubImage = 4;

            for ($i = 0; $i < 1 + $totalSubImage; $i++) {
                $subMedia = new Media();
                $subMedia->file_name = $i == 0 ? self::MAIN_IMAGE_FILENAME : self::SUB_IMAGE_FILENAME;
                $subMedia->file_url = $i == 0 ? self::MAIN_IMAGE_URL : self::SUB_IMAGE_URL;
                $subMedia->size = 69420;

                $robot->medially()->save($subMedia);
            }
        });
    }
}
