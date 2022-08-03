<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\docsController;

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

Route::get('/',[App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Documentos/Cadastro', [App\Http\Controllers\docsController::class, 'cadastro'])->name('docs.cad');
Route::post('/Documentos/Cadastro/Salvar', [App\Http\Controllers\docsController::class, 'salvar'])->name('docs.salvar');
Route::get('/Documentos/Consulta', [App\Http\Controllers\docsController::class, 'consulta'])->name('docs.con');
Route::get('/Documentos/Deletar/{id}', [App\Http\Controllers\docsController::class, 'deletar'])->name('docs.del');
Route::get('/Documentos/Autorizar/{id}', [App\Http\Controllers\docsController::class, 'autorizar'])->name('docs.aut');
