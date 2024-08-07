<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ContactController::class, 'view']);
Route::get('/contacts/create', [ContactController::class, 'create']);
Route::get('/contacts', [ContactController::class, 'index']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::get('/contacts/{id}', [ContactController::class, 'show']);
Route::get('/contacts/{id}/edit', [ContactController::class, 'edit']);
Route::post('/contacts/{id}/update', [ContactController::class, 'update']);
Route::get('/contacts/{id}/delete', [ContactController::class, 'destroy']);
