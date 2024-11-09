<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

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
    return redirect()->route('dashboard');
})->middleware(['autologin']);

Route::middleware(['autologin'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/new-agreement', function () {
    return view('new_agreement');
})->middleware(['autologin'])->name('new-agreement');

Route::get('/rental-payment', function () {
    return view('rental_payment');
})->middleware(['autologin'])->name('rental-payment');

Route::get('/collection', function () {
    return view('collection');
})->middleware(['autologin'])->name('collection');

Route::get('/clock-in-out', function () {
    return view('clock_in_out');
})->middleware(['autologin'])->name('clock-in-out');

// ROUTES FOR STORE
Route::middleware(['autologin'])->group(function () {
    Route::get('/stores', [StoreController::class, 'index'])->name('stores.index');
    Route::post('/stores/update-groups', [StoreController::class, 'updateGroups'])->name('stores.updateGroups');
});

// ROUTES FOR DASHBOARD
Route::get('/competition-data', [DashboardController::class, 'competitionStoreData'])->name('competition-data.index');

require __DIR__ . '/auth.php';
