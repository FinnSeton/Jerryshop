<?php

namespace App\Http\Controllers;

use App\Models\Winkelwagen;
use Illuminate\Http\Request;

class WinkelwagenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('winkelwagen');
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
    public function show(Winkelwagen $winkelwagen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Winkelwagen $winkelwagen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Winkelwagen $winkelwagen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Winkelwagen $winkelwagen)
    {
        //
    }
}
