<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $achievement=Achievement::included()->get();
        return response()->json($achievement);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $request->validate([
            'Nombre' => 'required|string|max:30',
            'Descripcion' => 'required|string|max:200',
            'Premio' => 'required|string|max:100',
            'level_id' => 'required|exists:Levels,id',
            'children_id' => 'required|exists:childrens,id',
            
        ]);

        $achievement = Achievement::create($request->all());
        return response()->json(['message'=>"Registro Creado Exitosamente", $achievement]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id){
        $achievement = Achievement::findOrFail($id);
        return response()->json(['message'=>"Registgro Enseñado Exitosamente", $achievement]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Achievement $achievement){
        $request->validate([
            'Nombre' => 'required|string|max:30',
            'Descripcion' => 'required|string|max:200',
            'Premio' => 'required|string|max:100',
            'level_id' => 'required|exists:Levels,id',
            'children_id' => 'required|exists:childrens,id',
        ]);

        $achievement->update($request->all());
        return response()->json(['message'=>"Registro Actualizado Exitosamente",$achievement]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Achievement $achievement){
        $achievement->delete();
        return response()->json(['message'=> "Registro Elimiinado Exitosamente", $achievement]);
    }
}
