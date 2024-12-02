<?php

use App\Http\Controllers\JointController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StrainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/strains/all', [StrainController::class, 'index'])->name('strains.all');

Route::get('/strains/create', [StrainController::class, 'create'])->name('create.index');
Route::post('/strains/store', [StrainController::class, 'store'])->name('store.index');
Route::resource('strain', StrainController::class);
Route::delete('/strains/delete/{strain}', [StrainController::class, 'delete'])->name('strain.delete');
Route::post('/joints/store', [JointController::class, 'store'])->name('jointstore.index');
Route::delete('/joints/delete/{joint}', [JointController::class, 'delete'])->name('joint.delete');
Route::put('/strain/edit/{id}', [StrainController::class, 'update']);

