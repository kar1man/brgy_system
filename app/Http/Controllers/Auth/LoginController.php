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
            return redirect()->route('resident.dashboard'); // Redirect to Resident Dashboard
        }

        return back()->withErrors(['credentials' => 'Invalid Resident Credentials']);
    }

    // Official Login
    public function officialLogin(Request $request) {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(array_merge($credentials, ['role' => 'official']))) {
            return redirect()->route('official.dashboard'); // Redirect to Official Dashboard
        }

        return back()->withErrors(['credentials' => 'Invalid Official Credentials']);
    }

    public function residentDashboard() {
        return view('resident.dashboard');
    }

    public function officialDashboard() {
        return view('official.dashboard');
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