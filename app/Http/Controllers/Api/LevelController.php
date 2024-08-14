<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $level = Level::all();
        return response()->json($level);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => '|max:30',
            'description_level' => 'required|string|max:200',
            'prize_level' => 'required|string|max:50',
            'voice_option' => 'required|string|max:100',
            'level' => 'required|string|max:3',
            'help_level' =>'required|string|max:200',
            'score_level' => 'required|integer|max:4',
            'topic_id' => 'required|exists:topics,id',
        ]);
        $level = Level::create($request->all());
        return response()->json($level);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $level = Level::findOrFail($id);
        return response()->json($level);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Level $level)
    {
        $request->validate([
            'name' => '|max:30',
            'description_level' => 'required|string|max:200',
            'prize_level' => 'required|string|max:50',
            'voice_option' => 'required|string|max:100',
            'level' => 'required|string|max:3',
            'help_level' =>'required|string|max:200',
            'score_level' => 'required|integer|max:4',
            'topic_id' => 'required|exists:topics,id',
        ]);
        $level -> Level::update($request->all());
        return response()->json($level);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Level $level)
    {
        $level ->delete();
        return response()->json("eliminado");
    }
}
