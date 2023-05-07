<?php

namespace App\Http\Controllers;

use App\Models\Robot;
use Cloudinary\Transformation\Resize;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $categories = [
            [
                'name' => 'Industrial',
                'image_url' => Cloudinary::getImage('industrial_ovpxmy')
                    ->resize(Resize::scale()->width(400)->height(400))->toUrl(),
            ],
            [
                'name' => 'Spare parts',
                'image_url' => Cloudinary::getImage('arduino_lpqzv3')
                    ->resize(Resize::scale()->width(400)->height(400))->toUrl(),
            ],
            [
                'name' => 'The one',
                'image_url' => Cloudinary::getImage('tesla_hzvrgi')
                    ->resize(Resize::scale()->width(400)->height(400))->toUrl(),
            ]
        ];

        $featuredRobots = Robot::inRandomOrder()->limit(3)->get();
        return view('welcome', compact('featuredRobots', 'categories'));
    }
}
