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
Route::get('/modificacao_estoque/search', [Controllers\ModificacaoEstoqueController::class, 'search'])->name('modificacao_estoque.search');
Route::get('/modificacao_estoque/pdf', [Controllers\ModificacaoEstoqueController::class, 'gerarPDF'])->name('modificacao_estoque.gerarpdf');
Route::get('/modificacao_estoque/index', [Controllers\ModificacaoEstoqueController::class, 'index'])->name('modificacao_estoque.index');

// ROUTS COMPRRAS
Route::get('/compra', [Controllers\ListaComprasController::class, 'index'])->name('compra.index');
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
Route::post('/produtos/pesquisa', [Controllers\ProdutosController::class, 'store'])->name('produtos.store');
Route::get('produtos/edit/{id}', [Controllers\ProdutosController::class, 'edit'])->name('produtos.edit');
Route::post('produtos/edit/{id}', [Controllers\ProdutosController::class, 'update'])->name('produtos.atualizar');
Route::post('/produtos/destroy/{id}', [Controllers\ProdutosController::class, 'delete']);
// ROUTS USUARIOS
Route::get('/usuarios', [Controllers\UsuariosController::class, 'index'])->name('usuarios.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
