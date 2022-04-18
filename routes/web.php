<?php

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

Route::get('/', 'OrcamentoController@home');
Route::get('/home', 'OrcamentoController@home');
Route::get('/cadastro', 'OrcamentoController@form');
Route::post('/criar', 'OrcamentoController@insert');
Route::post('/pesquisar', 'OrcamentoController@search');
Route::post('/resultados', 'OrcamentoController@index');
Route::get('/editar/{id}', 'OrcamentoController@edit');
Route::post('/update', 'OrcamentoController@update');
Route::get('/resultados/{id}', 'OrcamentoController@delete');
//Route::get('/excluir/{id}', 'OrcamentoController@delete');
//Route::get('/criar', 'OrcamentoController@home');
//Route::get('/resultados', 'OrcamentoController@home');

Route::get('/pesquisa', function () {
    return view('pesquisa');
});

Route::get('/editar', function () {
    return view('editar');
});
