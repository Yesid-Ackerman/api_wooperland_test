<?php

namespace App\Http\Controllers;

use App\Models\Children;
use Illuminate\Http\Request;

class ChildrenController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $childrens=Children::all();
        return response()->json($childrens);
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
            'slug' => 'required|max:255|unique:categories',

        ]);

        $children = Children::create($request->all());

        return response()->json($children);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $children = Children::included()->findOrFail($id);
        return response()->json($children);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Children $children)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Children $children)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:categories,slug,' . $children->id,

        ]);

        $children->update($request->all());

        return response()->json($children);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Children $children)
    {
        $children->delete();
        return response()->json($children);
    }
}
