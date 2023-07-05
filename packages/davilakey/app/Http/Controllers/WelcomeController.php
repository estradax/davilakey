<?php

namespace App\Http\Controllers;

use App\Models\Robot;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $categories = [
            [
                'name' => 'Industrial',
                'image_url' => '/assets/robot-categories/sparepart.jpg'
            ],
            [
                'name' => 'Spare Parts',
                'image_url' => '/assets/robot-categories/arduino.jpg'
            ],
            [
                'name' => 'The One',
                'image_url' => '/assets/robot-categories/tesla.jpg'
            ]
        ];

        $featuredRobots = Robot::inRandomOrder()->limit(3)->get();
        return view('welcome', compact('featuredRobots', 'categories'));
    }
}
