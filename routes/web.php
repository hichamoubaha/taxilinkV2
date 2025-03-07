<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\DriverAvailabilityController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;





Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('admin/users', UserController::class);
    Route::resource('admin/trips', TripController::class);
    Route::resource('admin/availabilities', DriverAvailabilityController::class);
});


// Trips route
Route::get('/trips', [TripController::class, 'index'])->name('trips.index');

// Driver availabilities route
Route::get('/availabilities', [DriverAvailabilityController::class, 'index'])->name('availabilities.index');

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

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

// Auth Routes (Login, Register, etc..)
require __DIR__.'/auth.php';

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile Routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit'); // Edit profile page
        Route::put('/update', [ProfileController::class, 'update'])->name('profile.update'); // Update profile
        Route::delete('/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Delete profile
    });

    // Trip Routes
    Route::resource('trips', TripController::class)->except(['show']); // All trip routes except show
    Route::get('/trips/book/{driver}', [TripController::class, 'book'])->name('trips.book'); // Book a trip with a specific driver
    Route::delete('/trips/{trip}/cancel', [TripController::class, 'cancel'])->name('trips.cancel'); // Cancel a trip

    // Driver Availability Routes
    Route::resource('availabilities', DriverAvailabilityController::class)->except(['show']); // All availability routes except show

    // Reservation Routes
    Route::resource('reservations', ReservationController::class)->except(['show']); // All reservation routes except show
});