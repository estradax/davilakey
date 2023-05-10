<?php

namespace Database\Seeders;

use App\Models\Robot;
use Illuminate\Database\Seeder;
use Spatie\SimpleExcel\SimpleExcelReader;

class RobotDataSeeder extends Seeder
{
    protected const DATASET_PATH = './database/seeders/robots-dataset.csv';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = SimpleExcelReader::create(self::DATASET_PATH)->getRows();
        $rows->each(function (array $prop) {
            $robot = Robot::factory([
                'name' => $prop['name'],
                'description' => $prop['description'],
                'price' => floatval($prop['price'])
            ])->create();

            RobotSeeder::seedImage($robot, 4);
        });
    }
}
