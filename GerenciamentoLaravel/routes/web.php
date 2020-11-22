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

Route::get('socios', 'SociosController@index');

Route::group(['prefix' => 'cidades', 'where' => ['id' => '[0-9]+']], function () {

    Route::get('',              ['as' => 'cidades',             'uses' => 'CidadesController@index']);
    Route::get('create',        ['as' => 'cidades.create',      'uses' => 'CidadesController@create']);
    Route::get('{id}/destroy',  ['as' => 'cidades.destroy',     'uses' => 'CidadesController@destroy']);
    Route::get('{id}/edit',     ['as' => 'cidades.edit',        'uses' => 'CidadesController@edit']);
    Route::put('{id}/update',   ['as' => 'cidades.update',      'uses' => 'CidadesController@update']);
    Route::post('store',        ['as' => 'cidades.store',       'uses' => 'CidadesController@store']);

});


Route::group(['prefix' => 'socios', 'where' => ['id' => '[0-9]+']], function () {

    Route::get('',              ['as' => 'socios',             'uses' => 'SociosController@index']);
    Route::get('create',        ['as' => 'socios.create',      'uses' => 'SociosController@create']);
    Route::get('{id}/destroy',  ['as' => 'socios.destroy',     'uses' => 'SociosController@destroy']);
    Route::get('{id}/edit',     ['as' => 'socios.edit',        'uses' => 'SociosController@edit']);
    Route::put('{id}/update',   ['as' => 'socios.update',      'uses' => 'SociosController@update']);
    Route::post('store',        ['as' => 'socios.store',       'uses' => 'SociosController@store']);

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
