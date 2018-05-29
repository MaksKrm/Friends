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

//Контроллеры панели администратора
Route::get('/admin', 'HomeController@index')->name('home');

Route::group( ['prefix' => 'admin'], function () {

    Route::resource('animals', 'admin\animals\AdminAnimalsController');
    Route::resource('help', 'admin\help\AdminHelpController');
    Route::resource('publication', 'admin\animals\PublicationsController');
    Route::resource('news', 'admin\news\AdminNewsController', ['as'=>'admin']);
    Route::resource('informations', 'admin\informations\AdminInformationController', ['as'=>'admin']);
    Route::resource('contacts', 'admin\contacts\AdminContactController', ['as'=>'admin']);
    Route::get('/reports', 'admin\reports\AdminReportsController@index');
    Route::post('/import', 'admin\reports\AdminReportsController@import')->name('import');
});

Auth::routes();

//Контроллеры страниц сайта
Route::get('/', 'PageController@getIndexPage')->name('index');

Route::resource('pets', 'Animals\IndexController')->only([ 'index', 'show' ]);
Route::resource('information', 'Information\IndexController')->only([ 'index', 'show' ]);
Route::resource('news', 'News\IndexController')->only([ 'index', 'show' ]);


Route::get('/help', 'PageController@getHelp')->name('help');
Route::get('/contacts', 'PageController@getContacts')->name('contacts');
//Route::get('/reports', 'PageController@getAllReports')->name('reports');


Route::any('/sendmail', 'help\HelpController@send');
Route::get('/reports', 'Reports\ReportsController@show')->name('reports');
