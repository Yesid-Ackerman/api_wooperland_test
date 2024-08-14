<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\FathterTopic;
use Illuminate\Http\Request;

class FathterTopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fathertopic = FathterTopic::all();
        return response()->json([$fathertopic]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'topic_id' => 'required|exists:topics,id',
            'father_id' => 'required|exists:fathers,id',
        ]);

        $fathertopic = FathterTopic::create($request->all());
        return response()->json([$fathertopic]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $fathertopic = FathterTopic::findOrFail($id);
        return response()->json(['message'=>"el registro se mostro exitosamente", $fathertopic]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FathterTopic $fathertopic)
    {
        $request->validate([
            'topic_id' => 'required|exists:topics,id',
            'father_id' => 'required|exists:fathers,id'.$fathertopic ->id,
        ]);

        $fathertopic -> update($request->all());
        return response()->json(['message'=>"el registro se actualizo exitosamente",$fathertopic ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FathterTopic $fathertopic)
    {
     $fathertopic->delete();
        return response()->json(['message'=>"Registro Elimiinado Exitosamente", $fathertopic]);
    }
}
