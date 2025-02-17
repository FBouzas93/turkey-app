<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\TurkeyController;

Route::get('turkeys/race', [RaceController::class, 'start'])->name('turkeys.race');
Route::get('turkeys/race-info', function() { 
    return view ('race.info');
})->name('turkeys.info');
Route::resource('turkeys', TurkeyController::class);