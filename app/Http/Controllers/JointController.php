<?php

namespace App\Http\Controllers;

use App\Models\Joint;
use App\Models\Strain;
use Illuminate\Http\Request;

class JointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'strain_id' => 'required|string',
            'prijs' => 'required|integer|min:0',
        ]);

        // Create the new Strain record using the validated data
        Joint::create($validated);

        // Redirect back or to the index page with a success message
        return redirect()->route('strains.all');
    }

    /**
     * Display the specified resource.
     */
    public function show(Joint $joint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $joint = Joint::find($id);

        if (!$joint) {
            return redirect()->route('strains.all')->with('error', 'Joint not found.');
        }

        return view('strain.edit', compact('joint'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Joint $joint)
    {
        $request->validate([
            'naam' => 'required|max:255',
            'strain_id' => 'required',
        ]);
        $post = Joint::find($joint);
        $post->update($request->all());
        return redirect()->route('strains.all')
            ->with('success', 'Strain updated successfully.');
    }
        //


    /**
     * Remove the specified resource from storage.
     */
    public function delete(Joint $joint)
    {
        Joint::destroy($joint->id);
        return redirect()->route('strains.all');
    }
}
