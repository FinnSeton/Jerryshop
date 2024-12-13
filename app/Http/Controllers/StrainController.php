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
    public function showDashboard()
    {
        $ids = [1, 2, 3, 4, 5, 9];

        $aantalstrains = Strain::whereIn('id', $ids)->get();

        return view('dashboard', ['strains' => $aantalstrains]);
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
            'prijs' => 'required|numeric|min:0',
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
            'prijs' => 'required|numeric|min:0',
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

    public function sort(Request $request)
    {

        $sortOption = $request->input('sort', 'price_asc');


        $query = Strain::query();

        switch ($sortOption) {
            case 'price_asc':
                $query->orderBy('prijs', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('prijs', 'desc');
                break;
            case 'thc_asc':
                $query->orderBy('thc', 'asc');
                break;
            case 'thc_desc':
                $query->orderBy('thc', 'desc');
                break;
            case 'cbd_asc':
                $query->orderBy('cbd', 'asc');
                break;
            case 'cbd_desc':
                $query->orderBy('cbd', 'desc');
                break;
            case 'name_asc':
                $query->orderBy('naam', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('naam', 'desc');
                break;
            default:
                $query->orderBy('prijs', 'asc');
                break;
        }


        $strains = $query->get();


        return view('strains.index', compact('strains'));
    }

}
