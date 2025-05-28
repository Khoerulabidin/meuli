<?php

use App\Http\Controllers\CodeMstrController;
use App\Http\Controllers\ProfileController;
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

    // code master
    Route::resource('CodeMstrs', CodeMstrController::class);
    Route::get('CodeMstrList', [CodeMstrController::class, 'index'])->name('CodeMstrList');
    Route::get('CodeMstr/{codemasterId}/delete', [App\Http\Controllers\CodeMstrController::class, 'destroy']);
});



require __DIR__ . '/auth.php';
