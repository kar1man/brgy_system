<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BusinessController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

// Resident Dashboard
Route::get('resident/dashboard', [LoginController::class, 'residentDashboard'])->name('resident.dashboard');
// Official Dashboard
Route::get('official/dashboard', [LoginController::class, 'officialDashboard'])->name('official.dashboard');


// Show login pages
Route::get('/login/resident', [LoginController::class, 'showResidentLogin'])->name('resident.login');
Route::get('/login/official', [LoginController::class, 'showOfficialLogin'])->name('official.login');

// Process login
Route::post('/login/resident', [LoginController::class, 'residentLogin']);
Route::post('/login/official', [LoginController::class, 'officialLogin']);


// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Manage Residents
Route::resource('residents', ResidentController::class);

// Announcements
Route::resource('announcements', AnnouncementController::class);
Route::get('resident/announcements', [AnnouncementController::class, 'residentIndex'])->name('resident.announcements.index');
Route::get('resident/announcements/{announcement}', [AnnouncementController::class, 'residentShow'])->name('resident.announcements.show');

// Complaints
Route::resource('complaints', ComplaintController::class)->except('create', 'store');
Route::get('resident/complaints', [ComplaintController::class, 'residentIndex'])->name('resident.complaints.index');
Route::get('resident/complaints/create', [ComplaintController::class, 'create'])->name('resident.complaints.create');
Route::post('resident/complaints', [ComplaintController::class, 'store'])->name('resident.complaints.store');
Route::get('resident/complaints/{complaint}', [ComplaintController::class, 'residentShow'])->name('resident.complaints.show');

// Appointments
Route::resource('appointments', AppointmentController::class)->except(['create', 'store']);
Route::get('resident/appointments', [AppointmentController::class, 'residentIndex'])->name('resident.appointments.index');
Route::get('resident/appointments/create', [AppointmentController::class, 'create'])->name('resident.appointments.create');
Route::post('resident/appointments', [AppointmentController::class, 'store'])->name('resident.appointments.store');
Route::get('resident/appointments/{appointment}', [AppointmentController::class, 'residentShow'])->name('resident.appointments.show');

// Business Registrations
Route::resource('businesses', BusinessController::class)->except(['create', 'store']);
Route::get('resident/businesses', [BusinessController::class, 'residentIndex'])->name('resident.businesses.index');
Route::get('resident/businesses/create', [BusinessController::class, 'create'])->name('resident.businesses.create');
Route::post('resident/businesses', [BusinessController::class, 'store'])->name('resident.businesses.store');
Route::get('resident/businesses/{business}', [BusinessController::class, 'residentShow'])->name('resident.businesses.show');

require __DIR__.'/auth.php';
