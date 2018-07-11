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

Route::group([
    'prefix' => 'podcast',
    'middleware' => ['auth']
], function(){
    Route::get('/novo', 'PodcastController@novo')->name('novo_podcast');
    Route::post('/cadastrar', 'PodcastController@cadastrar')->name('cadastrar_podcast');
    Route::get('/feed/{id}', 'PodcastController@feed')->name('feed');
});
