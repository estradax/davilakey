<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuccessfullyCheckoutController extends Controller
{
    public function __invoke(Request $request)
    {
        if (! $request->has('id')) {
            return redirect()->route('welcome');
        }

        $id = $request->get('id');

        $checkout = auth()->user()->checkouts()->find((int) $id);
        if (is_null($checkout)) {
            return redirect()->route('welcome');
        }

        return view('successfully-checkout');
    }
}
