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

Route::get('/', 'HomeController@index')->name('home');
Auth::routes();

//restrição de acesso à home definida no Controller
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/guerreiros', 'GuerreirosController@index')->name('guerreiros');
    Route::get('/guerreiros/novoguerreiro', 'GuerreirosController@novo')->name('formguerreiros');
    Route::post('/guerreiros/salvar', 'GuerreirosController@salvar');

    Route::get('/tipos', 'TiposController@index')->name('tipos');
    Route::get('/tipos/novotipo', 'TiposController@novo')->name('formtipos');
    Route::post('/tipos/salvar', 'TiposController@salvar')->name('tipos.salvar');;
    
    Route::get('/especialidades', 'EspecialidadesController@index')->name('especialidades');
    Route::get('/especialidades/novaespecialidade', 'EspecialidadesController@novo')->name('formespecialidades');
    Route::post('/especialidades/salvar', 'EspecialidadesController@salvar');
});