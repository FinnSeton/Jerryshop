<?php

use App\Http\Controllers\JointController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StrainController;
use App\Http\Controllers\WinkelwagenController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [StrainController::class, 'showDashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/strains/all', [StrainController::class, 'index'])->name('strains.all');

Route::get('/strains/create', [StrainController::class, 'create'])->name('create.index');
Route::post('/strains/store', [StrainController::class, 'store'])->name('store.index');
Route::resource('strain', StrainController::class);
Route::delete('/strains/delete/{strain}', [StrainController::class, 'delete'])->name('strain.delete');
Route::post('/joints/store', [JointController::class, 'store'])->name('joint.store');
Route::delete('/joints/delete/{joint}', [JointController::class, 'delete'])->name('joint.delete');
Route::put('/strain/edit/{id}', [StrainController::class, 'update'])->name('strain.update');
Route::put('/joint/update/{id}', [JointController::class, 'update'])->name('joint.update');
Route::get('/strains/sort', [StrainController::class, 'sort'])->name('strain.sort');
Route::get('/winkelwagen', [WinkelwagenController::class, 'index'])->name('winkelwagen');
Route::get('/strains/{id}', [StrainController::class, 'show'])->name('strain.detail');


