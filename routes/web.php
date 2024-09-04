<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PainelController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\AuthController;

Route::post('/usuarios', [UsuarioController::class, 'store']);

Route::prefix('painel')->group(function () {
    Route::get('/', [PainelController::class, 'index'])->middleware('auth')->name('painel.index');
    Route::get('/cadastrar/empresa', [PainelController::class, 'empresaCadastrar'])->name('painel.cadastrar.empresa');
    Route::get('/editar/empresa/{id}', [PainelController::class, 'empresaEditar'])->name('painel.editar.empresa');

    Route::post('/cadastrar/empresa', [EmpresaController::class, 'store'])->name('painel.empresa.store');
    Route::put('/editar/empresa/{id}', [EmpresaController::class, 'update'])->name('painel.atualizar.empresa');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UsuarioController::class, 'login']);
Route::get('/csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
