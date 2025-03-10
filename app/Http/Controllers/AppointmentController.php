<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::with('resident')->get();
        return view('official.man_appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resident.appointments.create');
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
            'appointment_date' => 'required|date_format:Y-m-d\TH:i',
            'purpose' => 'required|string',
        ]);

        Appointment::create([
            'resident_id' => Auth::user()->resident->id,
            'appointment_date' => $request->appointment_date,
            'purpose' => $request->purpose,
        ]);

        return redirect()->route('resident.appointments.index')->with('success', 'Appointment request submitted successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        return view('official.man_appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        return view('official.man_appointments.edit', compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'appointment_date' => 'required|date_format:Y-m-d\TH:i',
            'purpose' => 'required|string',
            'status' => 'required|in:Pending,Approved',
        ]);

        $appointment->update($request->only(['appointment_date', 'purpose', 'status']));

        return redirect()->route('appointments.index')->with('success', 'Appointment status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }

    public function residentIndex()
    {
        $appointments = Appointment::where('resident_id', Auth::user()->resident->id)->get();   
        return view('resident.appointments.index', compact('appointments'));
    }

    public function residentShow(Appointment $appointment)
    {
        return view('resident.appointments.show', compact('appointment'));
    }

}
