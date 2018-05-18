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
});

Route::get('/warning/{id}', 'Animals\AdminAnimalsController@warning');
Route::resource('/animals', 'Animals\AdminAnimalsController');
Route::get('/publish', 'Animals\AdminAnimalsController@getpublish');
Route::get('/confirm', 'Animals\AdminAnimalsController@confirm')->name('confirm');
Route::resource('helpful_informations', 'Informations\Helpful_informationController');

Route::group( ['prefix' => 'admin'], function () {
    Route::resource('news', 'NewsController', ['as'=>'admin']);
});

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');



