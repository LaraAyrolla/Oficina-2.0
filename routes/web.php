<?php

use Illuminate\Support\Facades\Route;

/**
 * Routes para acessos das views pelo método GET.
 */
Route::get('/', 'OrcamentoController@home');
Route::get('/home', 'OrcamentoController@home');
Route::get('/cadastro', 'OrcamentoController@form');
Route::get('/pesquisa', 'OrcamentoController@search');
Route::get('/resultados', 'OrcamentoController@index');

/**
 * Routes para acessos das views pelo método POST
 * através de operações dentro do app.
 */
Route::post('/criar', 'OrcamentoController@insert');
Route::post('/pesquisa', 'OrcamentoController@search');
Route::post('/resultados', 'OrcamentoController@index');

/**
 * Routes para os botões de editar e deletar orçamentos.
 */
Route::get('/editar/{id}', 'OrcamentoController@edit');
Route::post('/update', 'OrcamentoController@update');
Route::get('/resultados/{id}', 'OrcamentoController@delete');
Route::get('/resultados', 'OrcamentoController@delete');