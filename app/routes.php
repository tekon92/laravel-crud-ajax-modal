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
	// return View::make('hello');
	return View::make('admin.index');
});

Route::get('events', ['uses' => 'EventController@index', 'as' => 'category.index']);
Route::post('create', ['uses' => 'EventController@create', 'as' => 'category.create']);
Route::get('/show/{id}', ['uses' => 'EventController@show', 'as' => 'category.show']);
Route::get('/edit/{id}', ['uses' => 'EventController@edit', 'as' => 'category.edit']);
Route::get('/delete/{id}', ['uses' => 'EventController@delete', 'as' => 'category.deletex']);
Route::patch('update/{id}', ['uses' => 'EventController@update', 'as' => 'category.update']);
ROute::get('/delete/conf/{id}', ['uses' => 'EventController@destroy', 'as' => 'category.delete']);
