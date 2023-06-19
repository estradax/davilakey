<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Robot;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request) {
        $products = Product::paginate(9);
        $categories = Category::all();

        return view('shop', compact('products', 'categories'));
    }

    public function show(Robot $robot) {
        $relatedRobots = Robot::inRandomOrder()->take(12)->get();
        return view('shop-single', compact('robot', 'relatedRobots'));
    }
}
