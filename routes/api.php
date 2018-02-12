<?php

use Illuminate\Http\Request;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
//Route::post('register', 'AuthController@register');
//Route::post('login', 'AuthController@login');
//Route::post('recover', 'AuthController@recover');
//
//Route::group(['middleware' => ['jwt.auth']], function() {
//    Route::get('logout', 'AuthController@logout');
//});
//Route::get('test', 'TestController@show');
//Route::post('/auth', 'AuthController@authenticate');



Route::post('/add_lokal', 'GetterController@addLokal');
Route::post('/get_lokals', 'GetterController@getLokals');

Route::post('/add_obrok', 'GetterController@addObrok');
Route::post('/get_obroks', 'GetterController@getObroks');

Route::post('/add_user', 'GetterController@addUser');

Route::post('/add_order', 'GetterController@addOrder');
Route::post('/get_orders', 'GetterController@getOrders');

Route::post('/send_order', 'GetterController@delOrder');

//Route::group(['middleware' => 'auth:api'], function () {
//    Route::get('/tester',"GetterController@tester");
//});

Route::group(['middleware' => ['api']], function () {
    Route::post('auth/login', 'ApiController@login');
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::post('user', 'ApiController@getAuthUser');

       
    });
});


Route::post('/tester', "GetterController@tester");



