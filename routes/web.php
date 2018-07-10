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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/feed', 'FeedController@index')->name('feed');
Route::get('/feed/{id}/podcast', 'FeedController@podcast')->name('podcast');
Route::post('/feed/cadastrar', 'FeedController@cadastrar')->name('cadastrar_feed');
