<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Challenge;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $challenge = Challenge::all();
        return response()->json($challenge);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'description' => 'required|string|max:200',
            'activity' => 'required|string|max:50',
            'prize' => 'required|string|max:100',
            'nivel' => 'required|string|max:3',
            'children_id' =>'required|exists:childrens,id',
        ]);
        $challenge = Challenge::create($request->all());
        return response()->json([$challenge]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        {
            $challenge = Challenge::findOrFail($id);
            return response()->json($challenge);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Challenge $challenge)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'description' => 'required|string|max:200',
            'activity' => 'required|string|max:50',
            'prize' => 'required|string|max:100',
            'nivel' => 'required|string|max:3',
            'children_id' =>'required|exists:childrens,id',
        ]);
        $challenge -> Challenge::update($request->all());
        return response()->json([$challenge]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Challenge $challenge)
    {
        $challenge ->delete();
        return response()->json([$challenge]);
    }
}
