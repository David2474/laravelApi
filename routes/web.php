<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MarvelController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/marvel', [MarvelController::class, 'obtenerComic'])->name('marvel.index');


// web.php
Route::get('/marvel/{comic}', [MarvelController::class, 'show'])->name('marvel.detalle');



Route::get('/sync-comics', [MarvelController::class, 'syncComics']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
