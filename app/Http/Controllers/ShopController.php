<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Robot;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request) {
        $filterMode = false;
        $category = null;

        if ($request->has('cat') && ! is_null($request->get('cat')) && is_numeric($request->get('cat'))) {
            $filterMode = true;
            $category = Category::find((int) $request->get('cat'));
        }

        if ($filterMode && ! is_null($category)) {
            $robots = $category->robots()->paginate(9);
        } else {
            $robots = Robot::paginate(9);
        }

        $categories = Category::all();
        return view('shop', compact('robots', 'categories'));
    }

    public function show(Robot $robot) {
        $relatedRobots = Robot::inRandomOrder()->take(12)->get();
        return view('shop-single', compact('robot', 'relatedRobots'));
    }
}
