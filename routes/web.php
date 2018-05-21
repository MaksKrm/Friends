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

Route::resource('/animalsClient', 'Animals\IndexController');

Route::group( ['prefix' => 'admin'], function () {
    //admins modules animals
    Route::resource('/animals', 'admin\animals\AdminAnimalsController');
    Route::resource('/publication', 'admin\animals\PublicationsController');


    Route::resource('news', 'NewsController', ['as'=>'admin']);
	Route::resource('helpful_informations', 'Informations\Helpful_informationController', ['as'=>'admin']);
});

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');



