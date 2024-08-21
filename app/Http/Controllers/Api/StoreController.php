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
        $stores = Store::included() // Incluye relaciones según el parámetro 'included'
                       ->filter()   // Aplica filtros según el parámetro 'filter'
                       ->sort()     // Ordena los resultados según el parámetro 'sort'
                       ->getOrPaginate(); // Pagina los resultados si se proporciona el parámetro 'perPage'
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
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $store = Store::create($request->all());

        return response()->json($store, 201); // Retorna un código 201 (Creado)
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $store = Store::included()->findOrFail($id); // Incluye relaciones según el parámetro 'included'
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
        $request->validate([
            'name' => 'nullable|string|max:255',
        ]);

        $store->update($request->only(['name']));

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
        $store->delete();
        return response()->json(['message' => 'Eliminado Correctamente']);
    }
}
