<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SistemaController;
use App\Http\Controllers\PainelController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sistema', [SistemaController::class, 'index'])->name('sistema.index');
Route::get('/painel', [PainelController::class, 'index'])->name('painel.index');

Route::post('/register', [UsuarioController::class, 'store']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UsuarioController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/painel', function () {
        return view('painel');
    });
});
