<?php

namespace App\Http\Controllers;

use App\Models\Strain;
use Illuminate\Http\Request;

class StrainController extends Controller
{
    public function index()
    {
        $aantalstrains = Strain::all();
        return view('strains.index', ['strains' => $aantalstrains]);
    }

    public function create()
    {
        return view("strains.create");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'naam' => 'required|string',
            'merk' => 'required|string',
            'soort' => 'required|string',
            'thc' => 'required|integer|min:0',
            'cbd' => 'required|integer|min:0',
            'prijs' => 'required|float|min:0',
        ]);

        Strain::create($validated);

        return redirect()->route('strains.all')->with('success', 'Strain created successfully.');
    }

    public function show(Strain $strain)
    {
    }

    public function edit($id)
    {
        $strain = Strain::find($id);

        if (!$strain) {
            return redirect()->route('strains.all')->with('error', 'Strain not found.');
        }

        return view('strains.edit', compact('strain'));
    }

    public function update(Request $request, $id)
    {
        $strain = Strain::find($id);

        if (!$strain) {
            return redirect()->route('strains.all')->with('error', 'Strain not found.');
        }

        $validated = $request->validate([
            'naam' => 'required|string',
            'merk' => 'required|string',
            'soort' => 'required|string',
            'thc' => 'required|integer|min:0',
            'cbd' => 'required|integer|min:0',
            'prijs' => 'required|integer|min:0',
        ]);

        $strain->update($validated);

        return redirect()->route('strains.all')->with('success', 'Strain updated successfully.');
    }

    public function delete($id)
    {
        $strain = Strain::find($id);

        if (!$strain) {
            return redirect()->route('strains.all')->with('error', 'Strain not found.');
        }

        $strain->delete();

        return redirect()->route('strains.all')->with('success', 'Strain deleted successfully.');
    }
}
