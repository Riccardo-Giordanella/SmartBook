<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

// Route Appuntamento

Route::get('/prenota', [PublicController::class, 'prenota'])->middleware('auth')->name('prenota');

// Route Revisor

Route::get('/revisor/index', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/accept/{appointment}', [RevisorController::class, 'accept'])->name('accept');
Route::patch('/reject/{appointment}', [RevisorController::class, 'reject'])->name('reject');