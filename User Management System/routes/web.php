<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login')->name('login');


Route::controller(LoginController::class)->group(function () {

    Route::get('/login', 'Login')->name('auth.login');
    Route::post('/login_process', 'login_process')->name('login.submit');
    Route::get('/logout', 'logout')->name('auth.logout');
});

Route::middleware('auth')->group(function () {
    Route::prefix('users')->group(function () {

        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/', [UserController::class, 'store'])->name('users.store');
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        
        Route::get('/profile', [UserController::class, 'profile'])->name('auth.profile');
        
        Route::get('/{id}', [UserController::class, 'show'])->name('users.show');
        Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    });
});
