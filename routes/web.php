<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Controladores da aplicação
//use App\Http\Controllers\LojaController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\ConsumoController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\ObraController;

// Rota inicial
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (apenas autenticado e verificado)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas com autenticação
Route::middleware('auth')->group(function () {

    // Perfil do usuário
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUDs principais do sistema
    //Route::resource('obras', ObraController::class);

    // CRUD obras
    Route::get('obras', [ObraController::class, 'index'])->name('obras.index');
    Route::get('obras/create', [ObraController::class, 'create'])->name('obras.create');
    Route::post('obras', [ObraController::class, 'store'])->name('obras.store');
    Route::get('obras/{obra}/edit', [ObraController::class, 'edit'])->name('obras.edit');
    Route::put('obras/{obra}', [ObraController::class, 'update'])->name('obras.update');
    Route::delete('obras/{obra}', [ObraController::class, 'destroy'])->name('obras.destroy'); 


    

    Route::middleware('auth')->group(function () {Route::resource('obras', ObraController::class); });


    Route::resource('itens', ItemController::class);
    Route::resource('fornecedores', FornecedorController::class);
    Route::resource('contratos', ContratoController::class);

    // Estoques (se você quiser vincular ao id da loja)
    Route::resource('estoques', EstoqueController::class)->only(['index','create','store','show','edit','update','destroy']);

    //Route::resource('estoques', EstoqueController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('consumos', ConsumoController::class);


    // Consumos (se você só precisa do store, sem CRUD completo)
    Route::post('consumos', [ConsumoController::class, 'store'])->name('consumos.store');
});

// Autenticação (login, register etc.)
require __DIR__.'/auth.php';
