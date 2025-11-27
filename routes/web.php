<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

Route::get('/users/{user}/edit-password', [UserController::class, 'editPassword'])->name('users.edit.password');
Route::put('/users/{user}/update-password', [UserController::class, 'updatePassword'])->name('users.update.password');

Route::delete('/users/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');
