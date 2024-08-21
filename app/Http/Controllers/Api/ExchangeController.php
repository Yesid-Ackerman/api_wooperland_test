<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Exchange;
use Illuminate\Http\Request;

class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exchanges = Exchange::included() // Incluye relaciones según el parámetro 'included'
                             ->filter()   // Aplica filtros según el parámetro 'filter'
                             ->sort()     // Ordena los resultados según el parámetro 'sort'
                             ->getOrPaginate(); // Pagina los resultados si se proporciona el parámetro 'perPage'
        return response()->json($exchanges);
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
            'description' => 'required|string|max:255',
            'id_children' => 'required|exists:children,id',
            'id_article' => 'required|exists:articles,id',
        ]);

        $exchange = Exchange::create($request->all());

        return response()->json($exchange, 201); // Retorna un código 201 (Creado)
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exchange = Exchange::included()->findOrFail($id); // Incluye relaciones según el parámetro 'included'
        return response()->json($exchange);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exchange $exchange)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'id_children' => 'required|exists:children,id',
            'id_article' => 'required|exists:articles,id',
        ]);

        $exchange->update($request->all());

        return response()->json($exchange);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exchange = Exchange::find($id);

        if (!$exchange) {
            return response()->json(['message' => 'No existe ese registro'], 404);
        }

        $exchange->delete();
        return response()->json(['message' => 'Eliminado Correctamente']);
    }
}
