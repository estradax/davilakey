<?php

namespace App\Http\Controllers;

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

        $from = $request->get('f');
        if (! is_numeric($from)) {
            return view('checkout', [
                'fromJs' => true
            ]);
        }

        return view('checkout', [
            'fromJs' => false
        ]);
    }
}
