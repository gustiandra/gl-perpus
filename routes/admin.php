<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\RackController;
use Illuminate\Support\Facades\Route;

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Rack
Route::get('/rack', [RackController::class, 'index'])->name('rack.index');
Route::post('/rack', [RackController::class, 'store'])->name('rack.store');
Route::put('/rack{rack}', [RackController::class, 'update'])->name('rack.update');
Route::delete('/rack{rack}', [RackController::class, 'destroy'])->name('rack.destroy');

// Category
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::put('/category{category}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

// Book
Route::resource('/book', BookController::class);
Route::post('/book-code', [BookController::class, 'bookCodeStore'])->name('book-code.store');
Route::put('/book-code/{code}', [BookController::class, 'bookCodeUpdate'])->name('book-code.update');
Route::delete('/book-code/{code}', [BookController::class, 'bookCodeDestroy'])->name('book-code.destroy');

// Member
Route::get('/member/verifikasi', [MemberController::class, 'verifIndex'])->name('member.verif.index');
Route::get('/member/verifikasi/{user}', [MemberController::class, 'verifShow'])->name('member.verif.show');
Route::put('/member/verifikasi/{user}', [MemberController::class, 'verifUpdate'])->name('member.verif.update');


Route::resource('/member', MemberController::class);
Route::put('/member/change-status/{member}', [MemberController::class, 'changeStatus'])->name('member.change-status');
Route::get('/member-blocked', [MemberController::class, 'blockedMember'])->name('member.blocked.index');
Route::put('/member-blocked/{member}', [MemberController::class, 'unBlockMember'])->name('member.unblock');
