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
                'name' => 'Industrial',
                'image_url' => $media->image('industrial_ovpxmy')->toUrl()
            ],
            [
                'name' => 'Spare Parts',
                'image_url' => $media->image('arduino_lpqzv3')->toUrl()
            ],
            [
                'name' => 'The One',
                'image_url' => $media->image('tesla_hzvrgi')->toUrl(),
            ]
        ];

        $featuredRobots = Robot::inRandomOrder()->limit(3)->get();
        return view('welcome', compact('featuredRobots', 'categories'));
    }
}
