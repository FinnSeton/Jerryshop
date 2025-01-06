<?php

namespace App\Http\Controllers;

use App\Models\Strain;
use Illuminate\Http\Request;
use App\Models\Winkelwagen;

class WinkelwagenController extends Controller
{
    public function index()
    {
        // Retrieve cart items from session or database
        $cartItems = session()->get('cart', []);

        return view('winkelwagen', compact('cartItems'));
    }

    public function add(Request $request)
    {
        $cart = session()->get('cart', []);

        // Voeg het product toe aan de winkelwagen
        $cart[] = [
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => 1, // Standaard één item toevoegen
            'type' => $request->type,
            'thc' => $request->thc,
            'cbd' => $request->cbd,
        ];

        // Bewaar de winkelwagen in de sessie
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product toegevoegd aan winkelwagen!');
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
