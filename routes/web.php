<?php

use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\RecadosController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', ['pagina' => 'home']);
})->name('home');

Route::get('produtos', [ProdutosController::class, 'index'])->name('produtos');

Route::get('/produtos/inserir', [ProdutosController::class, 'create'])->name('produtos.inserir');

Route::post('/produtos/inserir', [ProdutosController::class, 'insert'])->name('produtos.gravar');

Route::get('/produtos/{prod}', [ProdutosController::class, 'show'])->name('produtos.show');

Route::get('/produtos/{prod}/editar', [ProdutosController::class, 'edit'])->name('produtos.edit');

Route::put('/produtos/{prod}/editar', [ProdutosController::class, 'update'])->name('produtos.update');

Route::get('/produtos/{prod}/apagar', [ProdutosController::class, 'remove'])->name('produtos.remove');

Route::delete('/produtos/{prod}/apagar', [ProdutosController::class, 'delete'])->name('produtos.delete');

Route::get('usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');

Route::prefix('usuarios')->group(function() {
    
    Route::get('/inserir', [UsuariosController::class, 'create'])->name('usuarios.inserir');
    Route::post('/inserir', [UsuariosController::class, 'insert'])->name('usuarios.gravar');

});

// Rota principal de visualização das informações

Route::get('recados', [RecadosController::class, 'index'])->name('recados');

// Rota para criar uma classe com as informações
Route::get('/recados/inserir', [RecadosController::class, 'create'])->name('recados.inserir');

// Rota para gravar as informações no banco
Route::post('/recados/inserir', [RecadosController::class, 'insert'])->name('recados.gravar');

// Rota para buscar as informações já existentes antes da alteração no banco
Route::get('/recados/{reca}/editar', [RecadosController::class, 'edit'])->name('recados.edit');

// Rota para editar as informações já existentes no banco
Route::put('/recados/{reca}/editar', [RecadosController::class, 'update'])->name('recados.update');

// Rota da página de segurança antes da exclusão do comentário
Route::get('/recados/{reca}/apagar', [RecadosController::class, 'remove'])->name('recados.remove');

// Rota para exclusão das informações do banco
Route::delete('/recados/{reca}/apagar', [RecadosController::class, 'delete'])->name('recados.delete');


Route::get('/login', [UsuariosController::class, 'login'])->name('login');
Route::post('/login', [UsuariosController::class, 'login']);

Route::get('/logout', [UsuariosController::class, 'logout'])->name('logout');
