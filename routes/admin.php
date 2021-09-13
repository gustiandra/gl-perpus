<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RackController;

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Rack
Route::get('/rak', [RackController::class, 'index'])->name('rack.index');
Route::post('/rak', [RackController::class, 'store'])->name('rack.store');
Route::put('/rak{rack}', [RackController::class, 'update'])->name('rack.update');
