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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'cidades', 'where' => ['id' => '[0-9]+']], function () {

        Route::any('',              ['as' => 'cidades',         'uses' => 'CidadesController@index']);
        Route::get('create',        ['as' => 'cidades.create',  'uses' => 'CidadesController@create']);
        Route::get('{id}/destroy',  ['as' => 'cidades.destroy', 'uses' => 'CidadesController@destroy']);
        Route::get('{id}/edit',     ['as' => 'cidades.edit',    'uses' => 'CidadesController@edit']);
        Route::put('{id}/update',   ['as' => 'cidades.update',  'uses' => 'CidadesController@update']);
        Route::post('store',        ['as' => 'cidades.store',   'uses' => 'CidadesController@store']);

    });

Route::group(['prefix' => 'ctgs', 'where' => ['id' => '[0-9]+']], function () {

        Route::any('',             ['as' => 'ctgs',         'uses' => 'CtgsController@index']);
        Route::get('create',       ['as' => 'ctgs.create',  'uses' => 'CtgsController@create']);
        Route::get('{id}/destroy', ['as' => 'ctgs.destroy', 'uses' => 'CtgsController@destroy']);
        Route::get('{id}/edit',    ['as' => 'ctgs.edit',    'uses' => 'CtgsController@edit']);
        Route::put('{id}/update',  ['as' => 'ctgs.update',  'uses' => 'CtgsController@update']);
        Route::post('store',       ['as' => 'ctgs.store',   'uses' => 'CtgsController@store']);

    });

Route::group(['prefix' => 'dependentes', 'where' => ['id' => '[0-9]+']], function () {

        Route::any('',             ['as' => 'dependentes', 'uses'         => 'DependentesController@index']);
        Route::get('create',       ['as' => 'dependentes.create', 'uses'  => 'DependentesController@create']);
        Route::get('{id}/destroy', ['as' => 'dependentes.destroy', 'uses' => 'DependentesController@destroy']);
        Route::get('{id}/edit',    ['as' => 'dependentes.edit', 'uses'    => 'DependentesController@edit']);
        Route::put('{id}/update',  ['as' => 'dependentes.update', 'uses'  => 'DependentesController@update']);
        Route::post('store',       ['as' => 'dependentes.store', 'uses'   => 'DependentesController@store']);

    });

Route::group(['prefix' => 'formas', 'where' => ['id' => '[0-9]+']], function () {

        Route::any('',             ['as' => 'formas',         'uses' => 'FormasController@index']);
        Route::get('create',       ['as' => 'formas.create',  'uses' => 'FormasController@create']);
        Route::get('{id}/destroy', ['as' => 'formas.destroy', 'uses' => 'FormasController@destroy']);
        Route::get('{id}/edit',    ['as' => 'formas.edit',    'uses' => 'FormasController@edit']);
        Route::put('{id}/update',  ['as' => 'formas.update',  'uses' => 'FormasController@update']);
        Route::post('store',       ['as' => 'formas.store',   'uses' => 'FormasController@store']);

    });


Route::group(['prefix' => 'socios', 'where' => ['id' => '[0-9]+']], function () {

        Route::any('',             ['as' => 'socios',         'uses' => 'SociosController@index']);
        Route::get('create',       ['as' => 'socios.create',  'uses' => 'SociosController@create']);
        Route::get('{id}/destroy', ['as' => 'socios.destroy', 'uses' => 'SociosController@destroy']);
        Route::get('{id}/edit',    ['as' => 'socios.edit',    'uses' => 'SociosController@edit']);
        Route::put('{id}/update',  ['as' => 'socios.update',  'uses' => 'SociosController@update']);
        Route::post('store',       ['as' => 'socios.store',   'uses' => 'SociosController@store']);

    });


    Route::group(['prefix' => 'pagamentos', 'where' => ['id' => '[0-9]+']], function () {

        Route::any('', ['as' => 'pagamentos', 'uses' => 'PagamentosController@index']);
        Route::get('create', ['as' => 'pagamentos.create', 'uses' => 'PagamentosController@create']);
        Route::get('{id}/destroy', ['as' => 'pagamentos.destroy', 'uses' => 'PagamentosController@destroy']);
        Route::get('{id}/edit', ['as' => 'pagamentos.edit', 'uses' => 'PagamentosController@edit']);
        Route::put('{id}/update', ['as' => 'pagamentos.update', 'uses' => 'PagamentosController@update']);
        Route::post('store', ['as' => 'pagamentos.store', 'uses' => 'PagamentosController@store']);

    });

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
