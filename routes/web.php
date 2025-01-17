<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CreateController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CreateUserController;
use App\Http\Controllers\MatcheController;

Route::get('/', [IndexController::class, 'view_index'])->name('index');
Route::post('/logar', [IndexController::class, 'logar']) ->name('logar');

Route::get('/view_user', [CreateUserController::class, 'view_create_user'])->name('view_user');
Route::post('/view_user', [CreateUserController::class, 'create_user'])->name('create_user');


// Todas as rotas dentro deste grupo requerem autenticação
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [IndexController::class, 'logout'])->name('logout');
    
    #Tela Cadastro
    Route::get('/create', [CreateController::class, 'view_create'])->name('view_create');
    Route::post('/create_team', [CreateController::class, 'create_team'])->name('create_team');
    Route::post('/create_championshiep', [CreateController::class, 'create_championshiep'])
                                                                ->name('create_championshiep');
    Route::post('/create_matche', [CreateController::class, 'create_matche'])
                                                                ->name('create_matche');

   
    #Tela partidas
    Route::get('/matche', [MatcheController::class, 'view_matche']);
    Route::get('matche_filter', [MatcheController::class, 'filter_controller'])->name('matche_filter');
   
    #Update and Destroy matche
    Route::put('/update-match/{id}', [MatcheController::class, 'updatematche'])->name('updatematche');
    Route::delete('/delete_partidas/{id}', [MatcheController::class, 'destroymatche'])->name('destroymatche');

     #Update and Destroy team
     Route::put('/update-team/{id}', [MatcheController::class, 'updateteam'])->name('updateteam');
     Route::delete('/delete_team/{id}', [MatcheController::class, 'destroyteam'])->name('destroyteam');

    #Update and Destroy championship
    Route::put('/update-championship/{id}', [MatcheController::class, 'updatechampionship'])->name('updatechampionship');
    Route::delete('/delete_championship/{id}', [MatcheController::class, 'destroychampionship'])->name('destroychampionship');

    #Update and Destroy championship
    Route::put('/update-user/{id}', [MatcheController::class, 'updateuser'])->name('updateuser');
    Route::delete('/delete_user/{id}', [MatcheController::class, 'destroyuser'])->name('destroyuser');


});