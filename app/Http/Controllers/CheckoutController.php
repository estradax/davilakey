<?php

namespace App\Http\Controllers;

use App\Models\Robot;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        if (! $request->has('f')) {
            return view('checkout', [
                'fromJs' => true
            ]);
        }

        $fromId = $request->get('f');
        if (! is_numeric($fromId)) {
            return view('checkout', [
                'fromJs' => true
            ]);
        }

        $robot = Robot::find((int)$fromId);

        return view('checkout', [
            'fromJs' => false,
            'robot' => $robot
        ]);
    }
}
