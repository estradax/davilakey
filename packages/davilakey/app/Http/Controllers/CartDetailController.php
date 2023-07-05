<?php

namespace App\Http\Controllers;

use App\Models\Robot;
use Illuminate\Http\Request;

class CartDetailController extends Controller
{
    public function __invoke(Request $request)
    {
        if (! $request->has('ids')) {
            return response()->json([]);
        }

        $ids = json_decode($request->query('ids'));
        if (is_null($ids)) {
            return response()->json([]);
        }

        $robots = Robot::find($ids);

        return response()->json($robots);
    }
}
