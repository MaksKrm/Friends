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

Route::resource('helpful_informations', 'Informations\Helpful_informationController');

Route::resource('news', 'NewsController', ['as'=>'admin']);

//Test views
/*
Route::get('/ct', function () {
    return view('pages.contacts');
});

Route::get('/at', function () {
    return view('pages.animals');
});

Route::get('/ht', function () {
    return view('pages.help');
});

*/