<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arduino = Category::create([
            'name' => 'Arduino'
        ]);
        $arduino->subCategories()->saveMany([
            SubCategory::factory([
                'name' => 'Components'
            ])->make(),
            SubCategory::factory([
                'name' => 'Toolkit'
            ])->make()
        ]);

        $spareparts = Category::create([
            'name' => 'Spareparts'
        ]);
        $spareparts->subCategories()->saveMany([
            SubCategory::factory([
                'name' => 'Low price'
            ])->make(),
            SubCategory::factory([
                'name' => 'Replaceable'
            ])->make(),
            SubCategory::factory([
                'name' => 'High price'
            ])->make()
        ]);


        $industrial = Category::create([
            'name' => 'Industrial'
        ]);
        $industrial->subCategories()->saveMany([
            SubCategory::factory([
                'name' => 'Auto Machine'
            ])->make(),
            SubCategory::factory([
                'name' => 'Mobile'
            ])->make()
        ]);
    }
}
