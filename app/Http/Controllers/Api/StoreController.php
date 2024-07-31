<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller; // Importa la clase Controller
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
        $store=Store::all();
        //$store = Store::included()->get();
        //$store=Store::included()->filter();
        //$store=Store::included()->filter()->sort()->get();
        //$store=Store::included()->filter()->sort()->getOrPaginate();
        return response()->json($store);
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

        return response()->json($store);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show($id) //si se pasa $id se utiliza la comentada
    {  
       // $store = Store::findOrFail($id);
        // $store = Store::included();
        $store = Store::included()->findOrFail($id);
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
            'name' => 'required|string|max:255',
        ]);

        $store->update($request->all());

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
        return response()->json($store);
    }
}