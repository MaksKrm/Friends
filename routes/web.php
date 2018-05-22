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

Route::get('/help', function () {
    return view('pages.help');
});

Route::resource('/animalsClient', 'Animals\IndexController');

Route::resource('/informations', 'Informations\IndexController');

Route::group( ['prefix' => 'admin'], function () {
    //admins modules animals
    Route::resource('/animals', 'admin\animals\AdminAnimalsController');
    Route::resource('/publication', 'admin\animals\PublicationsController');
    Route::resource('news', 'NewsController', ['as'=>'admin']);
	Route::resource('informations', 'admin\informations\AdminInformationController', ['as'=>'admin']);

});

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');

Route::get('/news', 'PageController@getAllNews')->name('news');

Route::get('/information', 'PageController@getAllInformation')->name('information');

Route::get('/help', 'PageController@getHelp')->name('help');

Route::get('/animals', 'PageController@getAllAnimals')->name('animals');

Route::get('/contacts', 'PageController@getContacts')->name('contacts');

Route::get('/reports', 'PageController@getAllReports')->name('reports');

Route::any('/sendmail', 'help\HelpController@send');

Route::get('/admin/reports', 'admin\reports\AdminReportsController@index');

Route::get('/reports', 'Reports\ReportsController@show')->name('reports');

Route::post('/import', 'admin\reports\AdminReportsController@import')->name('import');
