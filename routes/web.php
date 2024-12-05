<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

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

Route::get('/', [UsuarioController::class, 'tabela'])->name('cadastro');

Route::get('/tabela-clientes', [UsuarioController::class, 'tabela'])->name('TabelaRoute');

Route::post('/salvar-cadastro', [UsuarioController::class, 'salvarCadastro'])->name('salvarCadastro');

Route::delete('/excluir-cadastro/{usuario}', [UsuarioController::class, 'excluirCadastro'])->name('excluirCadastro');

Route::get('/editar-cadastro{usuario}', [UsuarioController::class, 'editar'])->name('editarCadastro');

Route::put('/atualizar-cadastro/{usuario}', [UsuarioController::class, 'atualizarCadastro'])->name('atualizarCadastro');
