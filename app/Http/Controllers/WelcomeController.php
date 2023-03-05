<?php

namespace App\Http\Controllers;

use App\Models\Robot;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $featuredRobots = Robot::inRandomOrder()->limit(3)->get();
        return view('welcome', compact('featuredRobots'));
    }
}
