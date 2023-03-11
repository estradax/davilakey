<?php

namespace App\Http\Controllers;

use App\Models\Robot;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() {
        $robots = Robot::paginate(9);
        return view('shop', compact('robots'));
    }

    public function show(Robot $robot) {
       $relatedRobots = Robot::inRandomOrder()->take(12)->get();
       return view('shop-single', compact('robot', 'relatedRobots'));
    }
}
