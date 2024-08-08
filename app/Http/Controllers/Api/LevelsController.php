<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Levels;
use Illuminate\Http\Request;

class LevelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels = Levels::all();
        return response()->json($levels);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'description_level' => 'required|string|max:200',
            'prize_level' => 'required|string|max:50',
            'voice_option' => 'required|string|max:100',
            'level' => 'required|string|max:3',
            'help_level' =>'required|string|max:200',
            'score_level' => 'required|integer|max:4',
            'topic_id' => 'required|exists:topics,id',
        ]);
        $levels = Levels::create($request->all());
        return response()->json($levels);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $levels = Levels::findOrFail($id);
        return response()->json($levels);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Levels $levels)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'description_level' => 'required|string|max:200',
            'prize_level' => 'required|string|max:50',
            'voice_option' => 'required|string|max:100',
            'level' => 'required|string|max:3',
            'help_level' =>'required|string|max:200',
            'score_level' => 'required|integer|max:4',
            'topic_id' => 'required|exists:topics,id',
        ]);
        $levels -> Levels::update($request->all());
        return response()->json($levels);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Levels $levels)
    {
        $levels ->delete();
        return response()->json($levels);
    }
}
