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
        return view("strains.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // error_log($request);

        // Validate the incoming data
        $validated = $request->validate([
            'naam' => 'required|string',
            'merk' => 'required|string',
            'soort' => 'required|string',
            'thc' => 'required|integer|min:0',
            'cbd' => 'required|integer|min:0',
            'prijs' => 'required|integer|min:0',
        ]);
        // dd($request);

        // Create the new Strain record using the validated data
        Strain::create($validated);

        // Redirect back or to the index page with a success message
        //return redirect()->route('strains.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Strain $strain)
    {
        // Show a specific strain (you can implement this later)
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Strain $strain)
    {
        // Show the form to edit the strain (you can implement this later)
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Strain $strain)
    {
        // Update logic goes here (you can implement this later)
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Strain $strain)
    {
        Strain::destroy($strain->id);
        return redirect()->route('strains.all')
            ->with('success', 'Strain deleted successfully');
    }
}
