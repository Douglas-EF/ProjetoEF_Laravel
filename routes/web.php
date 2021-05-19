<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\ListaComprasController;

Route::get('/', function () {
    return view('menu');
});

Route::get('/superior_direto', function () {
    return view('superior_direto_prod');
});

Route::get('/usuarios', [Controllers\UsuariosController::class, 'index']);

Route::get('/estoque', [Controllers\EstoqueController::class, 'index']);

Route::get('/compra', [Controllers\ListaComprasController::class, 'index']);

Route::get('/controles', [Controllers\ListaControlesController::class, 'index']);

Route::get('/cotacoes', [Controllers\CotacoesController::class, 'index']);

Route::get('/produtos', [Controllers\ProdutosController::class, 'index']);

// ROUTS FOR ADD
Route::get('/produtos/create', [Controllers\ProdutosController::class, 'create'])->name('produtos.create');
Route::post('/produtos/', [Controllers\ProdutosController::class, 'store'])->name('produtos.store');

Route::get('/compra/create', [Controllers\ListaComprasController::class, 'create'])->name('compra.create');

// ROUTS FOR ADD
Route::get('/compra/edit', [Controllers\ListaComprasController::class, 'edit'])->name('compra.edit');
Route::get('/compra/delete', [Controllers\ListaComprasController::class, 'delete'])->name('compra.delete');

// ROUTS FOR SEARCH
Route::any('estoque/search', [Controllers\EstoqueController::class, 'search'])->name('estoque.search');
Route::get('estoque/update/{id}', [Controllers\EstoqueController::class, 'update']);
