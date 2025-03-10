<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businesses = Business::with('resident')->get();
        return view('official.man_businesses.index', compact('businesses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resident.businesses.create');
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
            'business_name' => 'required|string|max:100',
            'owner_name' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:11',
        ]);

        Business::create([
            'business_name' => $request->business_name,
            'owner_name' => $request->owner_name,
            'address' => $request->address,
            'contact_number' => $request->contact_number,
            'resident_id' => Auth::user()->resident->id,
        ]);

        return redirect()->route('resident.businesses.index')->with('success', 'Business registration submitted successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        return view('official.man_businesses.show', compact('business'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        return view('official.man_businesses.edit', compact('business'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {
        $request->validate([
            'business_name' => 'required|string|max:100',
            'owner_name' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:11',
            'status' => 'required|in:Pending,Approved,Rejected',
        ]);

        $business->update($request->only(['business_name', 'owner_name', 'address', 'contact_number', 'status']));

        return redirect()->route('businesses.index')->with('success', 'Business status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business)
    {
        $business->delete();
        return redirect()->route('businesses.index')->with('success', 'Business deleted successfully.');
    }


    public function residentIndex()
    {
        $businesses = Business::where('resident_id', Auth::user()->resident->id)->get();
        return view('resident.businesses.index', compact('businesses'));
    }

    public function residentShow(Business $business)
    {
        return view('resident.businesses.show', compact('business'));
    }
}
