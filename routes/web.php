<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers;

Route::get('/', function () {
    return view('menu');
});

Route::get('/superior_direto', function () {
    return view('superior_direto.produto');
})->name('superior_direto.produto');

// ROUTS MODIFICAÇÕES ESTOQUE
Route::get('/modificacao_estoque/search', [Controllers\ModificacaoEstoqueController::class, 'search'])->name('modificacao_estoque.search');
Route::get('/modificacao_estoque/pdf', [Controllers\ModificacaoEstoqueController::class, 'gerarPDF'])->name('modificacao_estoque.gerarpdf');
Route::get('/modificacao_estoque/index', [Controllers\ModificacaoEstoqueController::class, 'index'])->name('modificacao_estoque.index');

// ROUTS COMPRAS
Route::get('/compras', [Controllers\ListaComprasController::class, 'index'])->name('compras.index');
Route::get('/compras/create', [Controllers\ListaComprasController::class, 'create'])->name('compras.create');
Route::post('/compras/store', [Controllers\ListaComprasController::class, 'store'])->name('compras.store');
Route::get('/compras/edit/{id}', [Controllers\ListaComprasController::class, 'edit'])->name('compras.edit');
Route::post('/compras/update/{id}', [Controllers\ListaComprasController::class, 'update'])->name('compras.update');
Route::post('/compras/destroy/{id}', [Controllers\ListaComprasController::class, 'destroy'])->name('compras.destroy');
Route::get('/compra/detalhes/{id}', [Controllers\ListaComprasController::class, 'show'])->name('compras.show');

// ROUTS ITENS LISTA COMPRA
Route::get('compras/item/create/{lista}', [Controllers\ItensListaCompraController::class, 'create'])->name('item_compra.create');
Route::post('compras/item/store', [Controllers\ItensListaCompraController::class, 'store'])->name('item_compra.store');
Route::get('compras/item/edit/{id}', [Controllers\ItensListaCompraController::class, 'edit'])->name('item_compra.edit');
Route::post('compras/item/update/{id}', [Controllers\ItensListaCompraController::class, 'update'])->name('item_compra.update');

// ROUTS ITENS LISTA CONTROLE
Route::get('/controles/item/create/{lista}', [Controllers\ItensListaControlesController::class, 'create'])->name('item_controle.create');
Route::post('/controles/item/store', [Controllers\ItensListaControlesController::class, 'store'])->name('item_controle.store');
Route::get('/controles/item/edit/{id}', [Controllers\ItensListaControlesController::class, 'store'])->name('item_controle.edit');
Route::post('/controles/item/update/{id}', [Controllers\ItensListaControlesController::class, 'store'])->name('item_controle.update');

// ROUTS CONTROLES
Route::get('/controles', [Controllers\ListaControlesController::class, 'index'])->name('controles.index');
Route::get('/controles/create', [Controllers\ListaControlesController::class, 'create'])->name('controles.create');
Route::post('/controles/store', [Controllers\ListaControlesController::class, 'store'])->name('controles.store');
Route::get('controles/edit/{id}', [Controllers\ListaControlesController::class, 'edit'])->name('controles.edit');
Route::post('controles/update/{id}', [Controllers\ListaControlesController::class, 'update'])->name('controles.update');
Route::post('controles/destroy/{id}', [Controllers\ListaControlesController::class, 'destroy'])->name('controles.destroy');
Route::get('/controles/detalhes/{id}', [Controllers\ListaControlesController::class, 'show'])->name('controles.show');

// ROUTS COTAÇÕES
Route::get('/cotacoes', [Controllers\CotacoesController::class, 'index'])->name('cotacoes.index');

// ROUTS ESTOQUE
Route::get('/estoque', [Controllers\EstoqueController::class, 'index'])->name('estoque.index');
Route::get('/estoque/historico', [Controllers\EstoqueController::class, 'create'])->name('estoque.historico');
Route::any('estoque/search', [Controllers\EstoqueController::class, 'search'])->name('estoque.search');
Route::patch('estoque/{estoque}', [Controllers\EstoqueController::class, 'update'])->name('estoque.update');

// ROUTS PRODUTOS
Route::get('/produtos', [Controllers\ProdutosController::class, 'index'])->name('produtos.index');
Route::get('/produtos/create', [Controllers\ProdutosController::class, 'create'])->name('produtos.create');
Route::post('/produtos/store', [Controllers\ProdutosController::class, 'store'])->name('produtos.store');
Route::get('produtos/edit/{id}', [Controllers\ProdutosController::class, 'edit'])->name('produtos.edit');
Route::post('produtos/update/{id}', [Controllers\ProdutosController::class, 'update'])->name('produtos.update');
Route::post('/produtos/destroy/{id}', [Controllers\ProdutosController::class, 'destroy']);
Route::any('produtos/search', [Controllers\ProdutosController::class, 'search'])->name('produtos.search');

// ROUTS USUARIOS
Route::get('/usuarios', [Controllers\UsuariosController::class, 'index'])->name('usuarios.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
