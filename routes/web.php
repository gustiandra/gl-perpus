<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Member\BookController;
use App\Http\Controllers\Member\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/book/{book}', [BookController::class, 'show'])->name('book.show');

Route::name('member.')
    ->middleware('auth', 'role:member')
    ->group(
        function () {
            Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');

            // Profil
            Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
            Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

            // Pinjam Buku
            Route::post('/borrow/{book}', [BookController::class, 'borrow'])->name('book.borrow');
        }
    );
