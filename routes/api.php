<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// CRUD
Route::apiResource('/cliente', 'ClienteController');
Route::apiResource('/colaborador', 'ColaboradorController');
Route::apiResource('/entrada', 'EntradaController');
Route::apiResource('/produto', 'ProdutoController');
Route::apiResource('/saida', 'SaidaController');
Route::apiResource('/venda', 'VendaController');

// Functionalidades
Route::get(
    '/saida/venda/{venda}',
    'SaidaController@showFromVenda'
)->name('saida.venda.show');
Route::get(
    '/venda/colaborador/{colaborador}',
    'VendaController@showFromColaborador'
)->name('venda.colaborador.show');
Route::put(
    '/venda/close/{colaborador}',
    'VendaController@close'
)->name('venda.close');