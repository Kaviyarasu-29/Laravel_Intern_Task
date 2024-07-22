<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/create-user', [UserController::class, 'Home'])->name('HomePage');
Route::post('/addUser',[UserController::class, 'addUser']);

Route::get('/userDetails', [UserController::class, 'listUser'])->name('userList');
Route::get('/userDetails/{id}', [UserController::class, 'CompleteDetails'])->name('userDetails');
// Route::put('/userDetails/{id}', [UserController::class, 'updateUser'])->name('updateUser');
// Route::delete('/user/delete/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');

Route::put('/updateUser/{id}', [UserController::class, 'updateUser'])->name('updateUser');
Route::delete('/user/delete/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');
