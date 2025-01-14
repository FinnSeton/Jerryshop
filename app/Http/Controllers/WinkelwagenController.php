<?php

namespace App\Http\Controllers;

use App\Models\Strain;
use Illuminate\Http\Request;

class WinkelwagenController extends Controller
{
    public function index()
    {
        $cartItems = session()->get('cart', []);
        return view('winkelwagen', compact('cartItems'));
    }

    public function add(Request $request)
    {
        $cart = session()->get('cart', []);
        $found = false;

        foreach ($cart as $key => $item) {
            if ($item['id'] == $request->id) {
                $cart[$key]['quantity'] += 1;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $cart[] = [
                'id' => $request->id,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => 1,
                'type' => $request->type,
                'thc' => $request->thc,
                'cbd' => $request->cbd,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('winkelwagen.index')->with('success', 'Product toegevoegd aan winkelwagen!');
    }

    public function update(Request $request, $cartItemId)
    {
        $cart = session()->get('cart', []);

        foreach ($cart as $key => $item) {
            if ($item['id'] == $cartItemId) {
                $cart[$key]['quantity'] = $request->quantity;
                break;
            }
        }

        session()->put('cart', $cart);
        return redirect()->route('winkelwagen.index');
    }

    public function remove($cartItemId)
    {
        $cart = session()->get('cart', []);

        $cart = array_filter($cart, function ($item) use ($cartItemId) {
            return $item['id'] !== $cartItemId;
        });

        session()->put('cart', array_values($cart));
        return redirect()->route('winkelwagen.index');
    }

    public function show($id)
    {
        $foundstrain = Strain::find($id);
        return view('winkelwagen.index', compact('foundstrain'));
    }
}
