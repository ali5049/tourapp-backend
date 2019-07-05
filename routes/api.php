<?php
/*
--------------------------------------------------------------------------
 API Routes
--------------------------------------------------------------------------
 Here is where you can register API routes for your application. These
 routes are loaded by the RouteServiceProvider within a group which
 is assigned the "api" middleware group. Enjoy building your API!
*/
use Illuminate\Http\Request;
Route::group(['middleware' => ['json.response']], function () {

    Route::middleware('auth:api')->get('/user', function (Request $request) {
       
        return Auth::user();
    });

    // public routes
    Route::post('/login', 'Api\AuthController@login')->name('login');
    Route::post('/register', 'Api\AuthController@register')->name('register.api');

    // private routes
    Route::middleware('auth:api')->group(function () {
        Route::get('/logout', 'Api\AuthController@logout')->name('logout');
        Route::get('/user', function (Request $request) {
       
            return Auth::user();
        });
        Route::resource('posts','PostsController');
    });

});