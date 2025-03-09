<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residents = Resident::paginate(10);
        return view("official.man_residents.index", compact("residents"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("official.man_residents.create");
    }

    public function store(Request $request)
    {
    $request->validate([
        'full_name' => 'required|string|max:100',
        'birthdate' => 'required|date',
        'address' => 'required|string|max:255',
        'contact_number' => 'required|string|max:11',
        'username' => 'required|string|max:50|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $resident = Resident::create($request->only(['full_name', 'birthdate', 'address', 'contact_number']));

    User::create([
        'username' => $request->username,
        'password' => Hash::make($request->password),
        'role' => 'resident',
        'resident_id' => $resident->id,
    ]);

    return redirect()->route('residents.index')
        ->with('success', 'Resident created successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function show(Resident $resident)
    {
        return view('official.man_residents.show', compact('resident'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function edit(Resident $resident)
    {
        return view('official.man_residents.edit', compact('resident'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resident $resident)
    {
        $request->validate([
            'full_name' => 'required|string|max:100',
            'birthdate' => 'required|date',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:11',
            'username'=> 'required|string|max:50|unique:users,username,'.$resident->user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);
        // upate for resident record
        $resident->update($request->only(['full_name', 'birthdate', 'address', 'contact_number']));
        
        // update user record
        $user = $resident->user;
        $user->username = $request->username;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('residents.index')
            ->with('success', 'Resident updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resident $resident)
    {
        if ($resident->user) {
            $resident->user->delete();
        }
        $resident->delete();
        return redirect()->route('residents.index')
            ->with('success', 'Resident deleted successfully.');
    }
}
