<?php
namespace App\Http\Controllers\Api;
namespace App\Http\Controllers;
use App\Models\ChildrenImage;
use Illuminate\Http\Request;

class ChildrenImageController extends Controller
{
    /**
    * Display a listing of the resource.
    */
   public function index(){
       $childrenimage = ChildrenImage::all();
       return response()->json($childrenimage);
   }
   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request){
       $request->validate([
           'Imagen' => 'required|string|max:30',
           'exchanges_id' => 'required|exists:exchanges,id',
       ]);

       $childrenimage = ChildrenImage::create($request->all());
       return response()->json(['message'=>"Registro Creado Exitosamente", $childrenimage]);
   }

   /**
    * Display the specified resource.
    */
   public function show($id){
       $childrenimage = ChildrenImage::findOrFail($id);
       return response()->json(['message'=>"Registgro Enseñado Exitosamente", $childrenimage]);

   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, ChildrenImage $childrenimage){
       $request->validate([
           'Imagen' => 'required|string|max:30',
       ]);

       $childrenimage->update($request->all());
       return response()->json(['message'=>"Registro Actualizado Exitosamente",$childrenimage]);
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(ChildrenImage $childrenimage){
       $childrenimage->delete();
       return response()->json(['message'=> "Registro Elimiinado Exitosamente",$childrenimage]);
   }
}
