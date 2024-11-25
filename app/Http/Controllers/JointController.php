<?php

namespace App\Http\Controllers;

use App\Models\Joint;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Joint $joint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Joint $joint)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
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
    public function destroy(Joint $joint)
    {

    }
}
