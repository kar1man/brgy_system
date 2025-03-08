<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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

require __DIR__.'/auth.php';
