<?php

namespace App\Http\Controllers;

use App\Models\Robot;
use Cloudinary\Transformation\Resize;
use App\Util\Clodinary as CloudinaryUtil;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $categories = [
            [
                'name' => 'Industrial',
                'image_url' => CloudinaryUtil::scaleTo('industrial_ovpxmy', 400, 400)->toUrl()
            ],
            [
                'name' => 'Spare parts',
                'image_url' => CloudinaryUtil::scaleTo('arduino_lpqzv3', 400, 400)->toUrl()
            ],
            [
                'name' => 'The one',
                'image_url' => CloudinaryUtil::scaleTo('tesla_hzvrgi', 400, 400)->toUrl()
            ]
        ];

        $featuredRobots = Robot::inRandomOrder()->limit(3)->get();
        return view('welcome', compact('featuredRobots', 'categories'));
    }
}
