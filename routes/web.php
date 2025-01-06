<?php

use App\Http\Controllers\JointController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StrainController;
use App\Http\Controllers\WinkelwagenController;
use Illuminate\Support\Facades\Route;

// Home route
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route
Route::get('/dashboard', [StrainController::class, 'showDashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Profile routes (alleen voor geauthenticeerde gebruikers)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Strain routes
Route::prefix('strains')->group(function () {
    Route::get('/all', [StrainController::class, 'index'])->name('strains.all');
    Route::get('/create', [StrainController::class, 'create'])->name('create.index');
    Route::post('/store', [StrainController::class, 'store'])->name('store.index');
    Route::get('/sort', [StrainController::class, 'sort'])->name('strain.sort');
    Route::get('/{id}', [StrainController::class, 'show'])->name('strain.detail');
    Route::delete('/delete/{strain}', [StrainController::class, 'delete'])->name('strain.delete');
    Route::put('/edit/{id}', [StrainController::class, 'update'])->name('strain.update');
});

// Resource route for strains
Route::resource('strain', StrainController::class);

// Joint routes
Route::post('/joints/store', [JointController::class, 'store'])->name('joint.store');
Route::delete('/joints/delete/{joint}', [JointController::class, 'delete'])->name('joint.delete');
Route::put('/joint/update/{id}', [JointController::class, 'update'])->name('joint.update');

// Winkelwagen routes
Route::prefix('winkelwagen')->middleware(['auth'])->group(function () {
    Route::get('/', [WinkelwagenController::class, 'index'])->name('winkelwagen.index');
    Route::post('/add', [WinkelwagenController::class, 'add'])->name('winkelwagen.add');
    Route::put('/update/{cartItem}', [WinkelwagenController::class, 'update'])->name('winkelwagen.update');
    Route::delete('/remove/{cartItem}', [WinkelwagenController::class, 'remove'])->name('winkelwagen.remove');


});

// Auth routes
require __DIR__ . '/auth.php';
