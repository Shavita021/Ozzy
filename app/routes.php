<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

Route::post('login', array('uses' => 'systemController@login'));

Route::get('logout', array('uses' => 'systemController@logout'));


Route::resource('adminMaestro', 'adminMaestroController');

Route::resource('adminSecundario', 'adminSecundarioController');

Route::resource('usuarioNormal', 'usuarioNormalController');

?>


