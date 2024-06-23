<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

// Route::middleware(['web'])->group(function () {
    Route::get('/login', [UserController::class, 'login_form'])->name('login');
    Route::post('/login', [UserController::class, 'login']);

    Route::get('/register', [UserController::class, 'register_form']);
    Route::post('/register', [UserController::class, 'register']);

    Route::get('/logout', [UserController::class, 'logout']);


// });

Route::middleware(['auth'])->group(function () {
    Route::get('event/create', [EventController::class, 'create']);
    Route::post('event/create', [EventController::class, 'submit']);
    Route::get('event/show', [EventController::class, 'show']);
    Route::get('event/{id}/edit', [EventController::class, 'edit']);
    Route::put('event/{id}/update', [EventController::class, 'update']);
    Route::get('event/{id}/delete', [EventController::class, 'delete']);
});
Route::get('/', function () {
    return view('welcome');
});

