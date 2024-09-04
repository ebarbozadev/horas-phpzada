<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SistemaController;
use App\Http\Controllers\PainelController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\TesteController;

use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/sistema', [SistemaController::class, 'index'])->name('sistema.index');
Route::get('/painel', [PainelController::class, 'index'])->middleware('auth');

Route::post('/usuarios', [UsuarioController::class, 'store']);

Route::prefix('painel')->group(function () {
    Route::get('/', [PainelController::class, 'index'])->middleware('auth')->name('painel.index');
    Route::get('/cadastrar/empresa', [PainelController::class, 'cadastrarEmpresa'])->name('painel.cadastrar.empresa');
    Route::get('/editar/empresa/{id}', [EmpresaController::class, 'edit'])->name('painel.editar.empresa');
    Route::post('/cadastrar/empresa', [EmpresaController::class, 'store'])->name('painel.empresa.store');
    Route::post('/editar/empresa/{id}', [EmpresaController::class, 'update'])->name('painel.atualizar.empresa');
});


Route::post('/testes', [TesteController::class, 'store']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UsuarioController::class, 'login']);
Route::get('/csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::middleware('auth')->group(function () {
//     Route::get('/painel', function () {
//         return view('painel');
//     });
// });
