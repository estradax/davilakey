<?php

namespace App\Http\Controllers;

use App\Media\CloudinaryMedia;
use App\Models\Robot;

class WelcomeController extends Controller
{
    public function __invoke(CloudinaryMedia $media)
    {
        $categories = [
            [
                'name' => 'Robot Industri',
                'image_url' => '/assets/robot-categories/sparepart.jpg'
            ],
            [
                'name' => 'Sparepart Robot',
                'image_url' => '/assets/robot-categories/arduino.jpg'
            ],
            [
                'name' => 'Robot ',
                'image_url' => '/assets/robot-categories/tesla.jpg'
            ]
        ];

        $featuredRobots = Robot::inRandomOrder()->limit(3)->get();
        return view('welcome', compact('featuredRobots', 'categories'));
    }
}
