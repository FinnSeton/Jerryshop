<?php

namespace App\Http\Controllers;

use App\Models\Strain;
use Illuminate\Http\Request;

class StrainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $aantalstrains = Strain::all();
        return view('strains.index', ['strains' => $aantalstrains]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Strains.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "id" => "required|integer|min:0",
            "naam" => "required|string",
            "merk" => "required|string",
            "soort" => "required|string",
            "thc" => "required|integer|min:0",
            "cbd" => "required|integer|min:0",
            "prijs" => "required|integer|min:0",
        ]);

        strains::create([
            "id" => $validated->strainnaam,
            "naam" => $validated->strainnaam,
            "merk" => $validated->strainnaam,
            "soort" => $validated->strainnaam,
            "thc" => $validated->strainnaam,
            "cbd" => $validated->strainnaam,
            "prijs" => $validated->strainnaam,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Strain $strain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Strain $strain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Strain $strain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Strain $strain)
    {
        //
    }
}
