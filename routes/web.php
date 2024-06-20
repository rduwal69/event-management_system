<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [App\Http\Controllers\EventController::class, 'dashboard']);
Route::get('/create', [App\Http\Controllers\EventController::class, 'create']);
Route::post('/create', [App\Http\Controllers\EventController::class, 'submit']);
Route::get('/show', [App\Http\Controllers\EventController::class, 'show']);
Route::get( 'event/{id}/edit', [App\Http\Controllers\EventController::class, 'edit']);
Route::put('event/{id}/update', [App\Http\Controllers\EventController::class, 'update']);
Route::get( 'event/{id}/delete', [App\Http\Controllers\EventController::class, 'delete']);

Route::get('/', function () {
    return view('welcome');
});

