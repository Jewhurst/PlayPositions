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

Route::get('/', function () {
    return view('index');
})->name('index');

Auth::routes();
//Route::any('/')
Route::resource('roster','RosterController');
Route::get('/home', 'HomeController@index')->name('home');
Route::any('/roster', 'RosterController@index')->name('roster');
Route::post('/roster/create', ['as' => 'roster-create', 'uses' => 'RosterController@create']);
Route::post('/roster/build', ['as' => 'roster-build', 'uses' => 'RosterController@build']);
Route::post('/roster/lineup', ['as' => 'roster-lineup', 'uses' => 'RosterController@show']);
