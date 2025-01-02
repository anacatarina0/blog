<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PostagemController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\SaidaController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FeedController::class, 'welcome'])->name('welcome');

Route::get('/feed/categoria', [FeedController::class, 'categoria'])->name('feed.categoria');
Route::get('/feed/categoria/{id}', [FeedController::class, 'categoriaById'])->name('feed.categoriaById');

Route::get('/feed/autor', [FeedController::class, 'autor'])->name('feed.autor');
Route::get('/feed/autor/{id}', [FeedController::class, 'autorById'])->name('feed.autorById');

// /feed/postagem/' . $value->id . '/comentario
Route::get('/feed/postagem/{id}/comentario', [FeedController::class, 'comentario'])->name('comentario');

Route::post('comentario', [ComentarioController::class, 'store'])->name('comentario.store');



Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    // Funcionario
    Route::get('/funcionario', [FuncionarioController::class, 'index']);


    // ----------------- categoria -----------------
    Route::middleware(['can:is_admin'])->group(function () {

        Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');

        Route::get('/categoria/create', [CategoriaController::class, 'create'])->name('categoria.create');

        Route::post('/categoria', [CategoriaController::class, 'store'])->name('categoria.store');

        Route::get('/categoria/{id}', [CategoriaController::class, 'show'])->name('categoria.show');

        Route::get('/categoria/{id}/edit', [CategoriaController::class, 'edit'])->name('categoria.edit');

        Route::put('/categoria/{id}', [CategoriaController::class, 'update'])->name('categoria.update');

        Route::delete('/categoria/{id}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');
    });

    // ----------------- categoria -----------------


    // ----------------- postagem -----------------

    Route::get('/postagem', [PostagemController::class, 'index'])->name('postagem.index');

    Route::get('/postagem/create', [PostagemController::class, 'create'])->name('postagem.create');

    Route::post('/postagem', [PostagemController::class, 'store'])->name('postagem.store');

    Route::get('/postagem/{id}', [PostagemController::class, 'show'])->name('postagem.show');

    Route::get('/postagem/{id}/edit', [PostagemController::class, 'edit'])->name('postagem.edit');

    Route::put('/postagem/{id}', [PostagemController::class, 'update'])->name('postagem.update');

    Route::delete('/postagem/{id}', [PostagemController::class, 'destroy'])->name('postagem.destroy');

    // ----------------- postagem -----------------
    //produto

    Route::get('/produto', [ProdutoController::class, 'index'])->name('produto.index');

    Route::get('/produto/create', [ProdutoController::class, 'create'])->name('produto.create');

    Route::post('/produto', [ProdutoController::class, 'store'])->name('produto.store');

    Route::get('/produto/{id}', [ProdutoController::class, 'show'])->name('produto.show');

    Route::get('/produto/{id}/edit', [ProdutoController::class, 'edit'])->name('produto.edit');

    Route::put('/produto/{id}', [ProdutoController::class, 'update'])->name('produto.update');

    Route::delete('/produto/{id}', [ProdutoController::class, 'destroy'])->name('produto.destroy');

    Route::post('/produto/add/{id}', [ProdutoController::class, 'add'])->name('produto.add');

    Route::get('/pesquisar', [ProdutoController::class, 'pesquisar'])->name('produtos.pesquisar');

    Route::get('/home', [ProdutoController::class, 'min'])->name('home');
    
    
    Route::get('home/funcionarios', [HomeController::class,'funcionarios'])->name('home.funcionarios');
    //Saida
    Route::get('/Saida', [ProdutoController::class, 'saida_produtos'])->name('saida_produtos');

    Route::get('/Saida/vender', [ProdutoController::class, 'saida_vender'])->name('saida_vender');

    Route::post('Saida/vender/{id}', [ProdutoController::class, 'vender'])->name('vender');
   

//protudo

//estoque
Route::get('/estoque', [EstoqueController::class, 'index'])->name('estoque.index');

Route::get('/estoque/{id}', [EstoqueController::class, 'show'])->name('estoque.show');



});



 
