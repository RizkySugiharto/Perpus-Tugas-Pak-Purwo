<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Models\Book;
use App\Models\Loan;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard', [
        'user' => Auth::user(),
        'countBooks' => Book::all()->count(),
        'countStudents' => User::all()->count(),
        'countUsers' => User::all()->count(),
        'countLoans' => Loan::all()->count(),
    ]);
})->name('dashboard')->middleware('auth');

Route::prefix('auth')->controller( AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login');
    Route::get('/logout', 'logout')->name('logout')->middleware('auth');
});

Route::resource('books', BookController::class)->middleware('auth');
Route::resource('users', UserController::class)->middleware('auth');
Route::prefix('loans')->name('loans.')->controller( LoanController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::put('/restore', 'restore')->name('restore');
    Route::delete('/destroy/{loan}', 'destroy')->name('destroy');
})->middleware('auth');
