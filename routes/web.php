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
    return view('welcome');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['register' => false]);

Route::get('/home','AdminControler@index')->middleware('role:admin')->name('admin.page');
Route::get('/admin-page','HomeController@index')->middleware('role:user')->name('home');
Route::get('/data-survey', 'HomeController@data')->middleware('role:user');
Route::post('/add-data', 'HomeController@store')->middleware('role:user');
Route::delete('/delete/{id}', 'HomeController@destroy')->middleware('role:user');
Route::get('/edit-data/{id}', 'HomeController@edit')->middleware('role:user');
Route::put('/edit-data/{id}', 'HomeController@update')->middleware('role:user');
Route::get('/detail/{id}', 'HomeController@show')->middleware('role:user');
Route::get('/cetak/{id}', 'HomeController@print')->middleware('role:user');

Route::get('download-data/', 'HomeController@printpdf')->middleware('role:user');
Route::get('dropdownlist/kelurahan/{id}', 'HomeController@kelurahan')->middleware('role:user');

Route::get('exportpdf/', 'HomeController@printpdf')->middleware('role:admin');
Route::get('detailadmin/{id}', 'HomeController@show')->middleware('role:admin');
Route::delete('/deleteadmin/{id}', 'HomeController@destroyadmin')->middleware('role:admin');
Route::post('/adduser', 'HomeController@addUser')->middleware('role:admin');
Route::get('/cetak/{id}', 'HomeController@print')->middleware('role:admin');

// Route::get('/maps', 'HomeController@render')->middleware('role:user');

// \PWA::routes();
