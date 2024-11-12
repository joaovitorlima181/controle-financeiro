<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEntryRequest;
use App\Http\Requests\UpdateEntryRequest;
use App\Models\Entry;
use App\Models\EntryType;
use Illuminate\Support\Facades\Log;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entries = Entry::join('entry_types', 'entries.entry_type_id', '=', 'entry_types.id')
            ->select('entries.*', 'entry_types.name as entry_type_name')
            ->get();
        $entryTypes = EntryType::select('id', 'name')->get();
        return view('cash-flow.entries.index', compact('entries', 'entryTypes'));
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
    public function store(StoreEntryRequest $request)
    {
        try {
            Entry::create([
                'title' => $request->title,
                'description' => $request->description,
                'amount' => $request->amount,
                'entry_type_id' => $request->entry_type,
                'entry_date' => $request->entry_date
            ]);
            return redirect()->route('entries')->with('success', 'Entry created successfully.');
        } catch (\Exception $e) {
            Log::debug('Error while creating entry: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Entry $entry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entry $entry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEntryRequest $request, int $id)
    {
        try {
            
            $entry = Entry::findOrFail($id);

            $entry->update([
                'title' => $request->title,
                'description' => $request->description,
                'amount' => $request->amount,
                'entry_type_id' => $request->entry_type,
                'entry_date' => $request->entry_date
            ]);

            $entry->save();

            return redirect()->route('entries')->with('success', 'Entry updated successfully.');   

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
            Entry::findOrFail($id)->delete();
            return redirect()->route('entries')->with('success', 'Entry deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
