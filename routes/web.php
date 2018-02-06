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
//

Route::get('/', 'AngularController@serveApp');
// ova ruta treba da pokrene angular kontroler, i tu angular preuzima, nema vise nista sta da radis sa laravelom za rute



Route::get('/unsupported-browser', 'AngularController@unsupported');
Route::get('/data', 'DataController@index');


Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/reset', 'Auth\PasswordController@reset');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
