<?php

namespace App\Http\Controllers;

use App\Models\Robot;

class WelcomeController extends Controller
{
    public function __invoke($media)
    {
        $categories = [
            [
                'name' => 'Industrial',
                'image_url' => '/assets/robot-categories/sparepart.jpg'
            ],
            [
                'name' => 'Spare parts',
                'image_url' => '/assets/robot-categories/arduino.jpg'
            ],
            [
                'name' => 'The one',
                'image_url' => '/assets/robot-categories/tesla.jpg'
            ]
        ];

        $featuredRobots = Robot::inRandomOrder()->limit(3)->get();
        return view('welcome', compact('featuredRobots', 'categories'));
    }
}
