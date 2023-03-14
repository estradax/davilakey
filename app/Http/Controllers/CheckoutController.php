<?php

namespace App\Http\Controllers;

use App\Models\Robot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'cart' => 'required'
        ]);

        // FIXME: Validate cart should be JSON with valid shape,
        //        Assume this is array of robot id.
        $cart = json_decode($request->get('cart'));

        $checkoutId = null;

        DB::transaction(function () use($cart, $request, &$checkoutId) {
            $robots = Robot::find($cart);

            $totalPrice = 0;
            $robots->each(function (Robot $robot) use (&$totalPrice) {
                $totalPrice += $robot->price;
            });

            $checkout = auth()->user()->checkouts()->create([
                'address' => $request->get('address'),
                'total_price' => $totalPrice
            ]);

            $checkoutId = $checkout->id;

            $robotIds = $robots->map(function (Robot $robot) {
                return $robot->id;
            });

            $checkout->robots()->attach($robotIds);
        });

        return redirect()->route('successfullyCheckout', ['id' => $checkoutId]);
    }
}
