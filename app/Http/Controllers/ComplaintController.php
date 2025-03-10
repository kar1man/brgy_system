<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints = Complaint::with('resident')->get();
        return view('official.man_complaints.index', compact('complaints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resident.complaints.create');
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
            'details' => 'required|string'
        ]);

        Complaint::create([
            'details' => $request->details,
            'resident_id' => Auth::user()->resident->id,
        ]);

        return redirect()->route('resident.complaints.index')->with('success', 'Complaint submitted successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
        return view('official.man_complaints.show', compact('complaint'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function edit(Complaint $complaint)
    {
        return view('official.man_complaints.edit', compact('complaint'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complaint $complaint)
    {
        $request->validate([
            'details' => 'required|string',
            'status' => 'required|in:Pending,Resolved'
        ]);

        $complaint->update($request->only(['details', 'status']));

        return redirect()->route('complaints.index')->with('success', 'Complaint updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint $complaint)
    {
        $complaint->delete();
        return redirect()->route('official.complaints.index')->with('success', 'Complaint deleted successfully.');
    }

    public function residentIndex()
    {
        $complaints = Complaint::where('resident_id', Auth::user()->resident->id)->get();
        return view('resident.complaints.index', compact('complaints'));
    }

    public function residentShow(Complaint $complaint)
    {
        return view('resident.complaints.show', compact('complaint'));
    }

}
