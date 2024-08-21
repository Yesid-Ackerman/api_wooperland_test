<?php

namespace App\Http\Controllers;

use App\Models\Father;
use Illuminate\Http\Request;

class FatherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fathers=Father::all();
        return response()->json($fathers);
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
        $request->validate([
            'name' => 'required|max:255',

        ]);

        $father = Father::create($request->all());

        return response()->json($father);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $father = Father::included()->findOrFail($id);
        return response()->json($father);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Father $father)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Father $father)
    {
        $request->validate([
            'name' => 'required|max:255' . $father->id,

        ]);

        $father->update($request->all());

        return response()->json($father);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Father $father)
    {
        $father->delete();
        return response()->json($father);
    }
}
