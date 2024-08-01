<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports=Report::all();
        return response()->json($reports);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'level_id' => 'required',
            'user_id' => 'required',
        ]);

        $report = Report::create($request->all());

        return response()->json($report);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //$report = Report::included()->findOrFail($id);
        $report = Report::findOrFail($id);
        return response()->json($report);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        $request->validate([
            'level_id' => 'required',
            'user_id' => 'required', 

        ]);

        $report->update($request->all());

        return response()->json($report);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        $report->delete();
        return response()->json($report);
    }
}
