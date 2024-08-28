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
        $level = level::included()->get();
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
            'score_level' => '',
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
        return response()->json(['message'=>"el registro se mostro exitosamente", $level]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Level $level)
    {
        $request->validate([
            'name' => '|string|max:255',
            'description_level' => '|string|max:255',
            'prize_level' => '|string|max:50',
            'voice_option' => '|string|max:100',
            'level' => '|string|max:3',
            'help_level' =>'|string|max:200',
            'score_level' => '|integer|max:4',
            'topic_id' => '|exists:topics,id',
        ]);
        $level->update($request->all());
        return response()->json(['message'=>"el registro se actualizo exitosamente", $level]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Level $level)
    {
        $level->delete();
        return response()->json(['message'=>"el registro se elimino exitosamente", $level]);
    }
}

