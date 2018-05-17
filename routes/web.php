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

//Страница - Полезная информация
Route::get('/helpful_informations', 'InformationsController@index')->name('index');

Route::group(['prefix' => 'admin'], function () {
    //Действия с полезной информацией в админке
    Route::get('/informations', 'InformationsController@indexForAdmin')->name('informations');//Отображение информации
    Route::any('newinformation', 'InformationsController@newInformation')->name('newinformation');//Добавление информации
    Route::get('delete/{id}', 'InformationsController@deleteInformation')->name('delete');//Удаление информации
    Route::any('edit/{id}', 'InformationsController@editInformation')->name('edit');//Редактирование информации

});

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