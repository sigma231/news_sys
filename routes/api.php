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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::post('createBusinessNews', 'businessController@createBusinessNews');
        Route::post('retrieveBusinessNews', 'businessController@retrieveBusinessNews');
        Route::post('deleteBusinessNews', 'businessController@deleteBusinessNews');

        Route::post('createEntertainmentNews', 'entertainmentController@createEntertainmentNews');
        Route::post('retrieveEntertainmentNews','entertainmentController@retrieveEntertainmentNews');
        Route::post('deleteEntertainmentNews', 'entertainmentController@deleteEntertainmentNews');

        Route::post('createNavigationNews', 'navigationController@createNavigationNews');
        Route::post('retrieveNavigationNews', 'navigationController@retrieveNavigationNews');
        Route::post('deleteNavigationNews', 'navigationController@deleteNavigationNews');

        Route::post('createSecurityNews', 'securityController@createSecurityNews');
        Route::post('retrieveSecurityNews', 'securityController@retrieveSecurityNews');
        Route::post('deleteSecurityNews', 'SsecurityController@deleteSecurityNews');

        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});
