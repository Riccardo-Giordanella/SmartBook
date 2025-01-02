<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

// Route Appuntamento

Route::get('/prenota', [PublicController::class, 'prenota'])->name('prenota');