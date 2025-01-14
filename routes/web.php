<?php

use App\Http\Controllers\CreateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\AuthController;

Route::get('/', [ViewController::class, 'view_index']) ->name('index');
Route::post('/', [AuthController::class, 'logar']) ->name('logar');

Route::get('/cadastros', [ViewController::class, 'view_cadastros']);
Route::get('/view_user', [ViewController::class, 'view_create_user'])->name('view_user');
Route::post('/view_user', [CreateController::class, 'create_user'])->name('create_user');
