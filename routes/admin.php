<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RackController;

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Rack
Route::get('/rak', [RackController::class, 'index'])->name('rack.index');
