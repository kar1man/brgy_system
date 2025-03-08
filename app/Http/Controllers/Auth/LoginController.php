<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
   
    // Show Resident Login Page
    public function showResidentLogin() {
        return view('auth.resident-login');
    }

    // Show Official Login Page
    public function showOfficialLogin() {
        return view('auth.official-login');
    }

    // Resident Login
    public function residentLogin(Request $request) {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(array_merge($credentials, ['role' => 'resident']))) {
            return view('resident.dashboard'); // Redirect to Resident Dashboard
        }

        return back()->withErrors(['username' => 'Invalid Resident Credentials']);
    }

     // Official Login
     public function officialLogin(Request $request) {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(array_merge($credentials, ['role' => 'official']))) {
            return view('official.dashboard'); // Redirect to Official Dashboard
        }

        return back()->withErrors(['username' => 'Invalid Official Credentials']);
    }

    /**
     * Logout the user.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
