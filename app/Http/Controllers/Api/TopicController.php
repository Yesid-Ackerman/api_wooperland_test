<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $topic= Topic::all();
        return response()->json($topic);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $request->validate([
            'Nombre' => 'required|string|max:30',
            'Descripcion' => 'required|string|max:200',
            'Dificultad' => 'required|string|max:100',
        ]);

        $topic = Topic::create($request->all());
        return response()->json(['message'=>"Registro Creado Exitosamente", $topic]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id){
        $topic = Topic::findOrFail($id);
        return response()->json(['message'=>"Registgro Enseñado Exitosamente", $topic]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topic $topic){
        $request->validate([
            'Nombre' => 'required|string|max:30',
            'Descripcion' => 'required|string|max:200',
            'Dificultad' => 'required|string|max:100',
        ]);

        $topic->update($request->all());
        return response()->json(['message'=>"Registro Actualizado Exitosamente",$topic]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic){
        $topic->delete();
        return response()->json(['message'=> "Registro Elimiinado Exitosamente",$topic]);
    }
}
