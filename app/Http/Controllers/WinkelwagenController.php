<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Winkelwagen;

class WinkelwagenController extends Controller
{
    /**
     * Toon de winkelwagenpagina.
     */
    public function index()
    {
        $items = Winkelwagen::all();
        $total = $items->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        return view('winkelwagen', [
            'items' => $items,
            'total' => $total,
        ]);
    }

    /**
     * Voeg een nieuw item toe aan de winkelwagen.
     */
    public function add(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
        ]);

        Winkelwagen::create($validated);

        return redirect()->route('winkelwagen.index')->with('success', 'Item toegevoegd aan de winkelwagen.');
    }

    /**
     * Update de hoeveelheid van een item.
     */
    public function update(Request $request, Winkelwagen $cartItem)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem->update($validated);

        return redirect()->route('winkelwagen.index')->with('success', 'Hoeveelheid bijgewerkt.');
    }

    /**
     * Verwijder een item uit de winkelwagen.
     */
    public function remove(Winkelwagen $cartItem)
    {
        $cartItem->delete();

        return redirect()->route('winkelwagen.index')->with('success', 'Item verwijderd.');
    }
}
