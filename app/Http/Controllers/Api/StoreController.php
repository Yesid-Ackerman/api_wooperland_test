<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todas las tiendas
        $stores = Store::all();
        return response()->json($stores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos del request
        $request->validate([
            'name' => 'string|max:255',
        ]);

        // Crear una nueva tienda
        $store = Store::create($request->all());

        return response()->json($store);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Obtener una tienda por ID
        $store = Store::findOrFail($id);
        return response()->json($store);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        // Validar los datos del request
        $request->validate([
            'name' => 'string|max:255',
        ]);

        // Actualizar los datos de la tienda
        $store->update($request->only(['name']));

        // Retornar la respuesta en formato JSON
        return response()->json($store);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        // Eliminar la tienda
        $store->delete();
        return response()->json('Eliminado Correctamente');
    }
}
