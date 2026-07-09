<?php

use App\Http\Controllers\Public\LandingController;
use Illuminate\Support\Facades\Route;

// Public site.
Route::get('/', [LandingController::class, 'index'])->name('landing');

require __DIR__.'/auth.php';
