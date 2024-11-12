<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOutflowRequest;
use App\Http\Requests\UpdateOutflowRequest;
use App\Models\Outflow;

class OutflowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outflows = Outflow::all();
        return view('cash-flow.outflows.index', compact('outflows'));
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
    public function store(StoreOutflowRequest $request)
    {
        try {
            Outflow::create($request->all());
            return redirect()->route('outflow')->with('success', 'Outflow created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Outflow $outflow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Outflow $outflow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOutflowRequest $request, int $id)
    {
        try {
            $outflow = Outflow::findOrFail($id);
            $outflow->update($request->all());
            return redirect()->route('outflow')->with('success', 'Outflow updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            Outflow::findOrFail($id)->delete();
            return redirect()->route('outflow')->with('success', 'Outflow deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
