<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RackController;
use Illuminate\Support\Facades\Route;

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Rack
Route::get('/rak', [RackController::class, 'index'])->name('rack.index');
Route::post('/rak', [RackController::class, 'store'])->name('rack.store');
Route::put('/rak{rack}', [RackController::class, 'update'])->name('rack.update');
Route::delete('/rak{rack}', [RackController::class, 'destroy'])->name('rack.destroy');

// Category
Route::get('/kategori', [CategoryController::class, 'index'])->name('category.index');
Route::post('/kategori', [CategoryController::class, 'store'])->name('category.store');
Route::put('/kategori{category}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/kategori{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

// Book
Route::resource('/book', BookController::class);
