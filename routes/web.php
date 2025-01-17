<?php

use App\Http\Controllers\CreateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowController;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConfController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\DestroyController;

use App\Http\Controllers\Controller;

Route::get('/', [ShowController::class, 'view_index']) ->name('index');
Route::post('/logar', [AuthController::class, 'logar']) ->name('logar');
Route::get('/view_user', [ShowController::class, 'view_create_user'])->name('view_user');
Route::post('/view_user', [CreateController::class, 'create_user'])->name('create_user');


// Todas as rotas dentro deste grupo requerem autenticação
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/partidas', [ShowController::class, 'view_matche']);
    Route::post('/partidas_filter', [ConfController::class, 'filter_controller'])->name('partidas_filter');
   
    #Update and Destroy matche
    Route::put('/update-match/{id}', [UpdateController::class, 'updatematche'])->name('updatematche');
    Route::delete('/delete_partidas/{id}', [DestroyController::class, 'destroymatche'])->name('destroymatche');

     #Update and Destroy team
     Route::put('/update-team/{id}', [UpdateController::class, 'updateteam'])->name('updateteam');
     Route::delete('/delete_team/{id}', [DestroyController::class, 'destroyteam'])->name('destroyteam');

    #Update and Destroy championship
    Route::put('/update-championship/{id}', [UpdateController::class, 'updatechampionship'])->name('updatechampionship');
    Route::delete('/delete_championship/{id}', [DestroyController::class, 'destroychampionship'])->name('destroychampionship');

    #Update and Destroy championship
    Route::put('/update-user/{id}', [UpdateController::class, 'updateuser'])->name('updateuser');
    Route::delete('/delete_user/{id}', [DestroyController::class, 'destroyuser'])->name('destroyuser');

    Route::get('/cadastros', [ShowController::class, 'view_create'])->name('view_create');
    Route::post('/cadastros_team', [CreateController::class, 'create_team'])->name('create_team');
    Route::post('/cadastros_championshiep', [CreateController::class, 'create_championshiep'])
                                                                ->name('create_championshiep');
    Route::post('/cadastros_matche', [CreateController::class, 'create_matche'])
                                                                ->name('create_matche');
});