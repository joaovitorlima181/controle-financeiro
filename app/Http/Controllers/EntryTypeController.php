<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEntryTypeRequest;
use App\Http\Requests\UpdateEntryTypeRequest;
use App\Models\EntryType;
use Illuminate\Support\Facades\Log;

class EntryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entryTypes = EntryType::all();
        return view('settings.entry-types.index', compact('entryTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEntryTypeRequest $request)
    {
        try {
            Log::debug('Creating EntryType: ' . json_encode($request->all()));
            EntryType::create($request->all());
            return redirect()->route('entry-types')->with('success', 'EntryType created successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating EntryType: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(EntryType $entryType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EntryType $entryType)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEntryTypeRequest $request, EntryType $entryType)
    {
        try {
            $entryType->update($request->all());
            session()->flash('success', 'EntryType updated successfully.');
            return $entryType;
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            EntryType::findOrFail($id)->delete();
            return redirect()->route('entry-types')->with('success', 'EntryType deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
