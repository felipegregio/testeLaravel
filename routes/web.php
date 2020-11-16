<?php

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

Route::get('/', 'LoginController@telaLogin');

Route::get('resultados', 'ResultadosController@telaResultado');
Route::post('resultados', 'ResultadosController@retornaResultado');
Route::post('login/checaLogin', 'LoginController@checaLogin');
Route::post('resultados/sucesso', 'InicioController@pesquisa');
Route::get('login/sucessoLogin', 'LoginController@sucessoLogin');
Route::resource('sucesso', 'ControllerSucesso@telaSucesso');
//Route::get('login/logout', 'LoginController@logout');

Route::get('inicio', 'InicioController@telaInicio');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

