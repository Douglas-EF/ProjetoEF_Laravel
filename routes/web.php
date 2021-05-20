<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers;

Route::get('/', function () {
    return view('menu');
});

Route::get('/superior_direto', function () {
    return view('superior_direto_prod');
});

// ROUTS MODIFICAÇÕES ESTOQUE
Route::get('/estoque/modificacaoestoque', [Controllers\ModificacaoEstoqueController::class, 'index'])->name('modificacaoestoque.index');

// ROUTS COMPRRAS
Route::get('/compra', [Controllers\ListaComprasController::class, 'index']);
Route::get('/compra/create', [Controllers\ListaComprasController::class, 'create'])->name('compra.create');
Route::get('/compra/edit', [Controllers\ListaComprasController::class, 'edit'])->name('compra.edit');
Route::get('/compra/delete', [Controllers\ListaComprasController::class, 'delete'])->name('compra.delete');
Route::get('/compra/store', [Controllers\ListaComprasController::class, 'store'])->name('compra.store');

// ROUTS CONTROLES
Route::get('/controles', [Controllers\ListaControlesController::class, 'index'])->name('controles.index');


// ROUTS COTAÇÕES
Route::get('/cotacoes', [Controllers\CotacoesController::class, 'index'])->name('cotacao.index');


// ROUTS ESTOQUE
Route::get('/estoque', [Controllers\EstoqueController::class, 'index'])->name('estoque.index');
Route::get('/estoque/historico', [Controllers\EstoqueController::class, 'create'])->name('estoque.historico');
Route::any('estoque/search', [Controllers\EstoqueController::class, 'search'])->name('estoque.search');
Route::patch('estoque/{estoque}', [Controllers\EstoqueController::class, 'update'])->name('estoque.update');


// ROUTS PRODUTOS
Route::get('/produtos', [Controllers\ProdutosController::class, 'index'])->name('produtos.index');
Route::get('/produtos/create', [Controllers\ProdutosController::class, 'create'])->name('produtos.create');
Route::post('/produtos/', [Controllers\ProdutosController::class, 'store'])->name('produtos.store');


// ROUTS USUARIOS
Route::get('/usuarios', [Controllers\UsuariosController::class, 'index'])->name('usuarios.index');
