<?php

namespace App\Http\Controllers;

use App\Models\Robot;
use Illuminate\Http\Request;

class RobotSearchController extends Controller
{
    public function __invoke(Request $request)
    {
        if (! $request->has('q')) {
            return response()->json([]);
        }

        $query = $request->get('q');
        if (is_null($query)) {
            return response()->json([]);
        }

        $robots = Robot::where('name', 'LIKE', '%'.$query.'%')
            ->orWhere('description', 'LIKE', '%'.$query.'%')
            ->take(10)->get();

        return response()->json($robots);
    }
}
