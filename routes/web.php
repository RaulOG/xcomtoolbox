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

Auth::routes();

Route::group(['middleware' => ['auth']], function(){

    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('pods', 'PodController', ['only' => ['index', 'store', 'destroy']]);

    Route::resource('aliens', 'AlienController', ['only' => ['store', 'destroy', 'update']]);

//    Route::resource('missions', 'MissionController', ['only' => ['store', 'show']]);

    Route::resource('missions', 'MissionController', ['only' => ['store', 'update', 'show']]);

    Route::prefix('toolbox')->group(function(){
        Route::get('/overview', 'ToolboxController@overview');
        Route::prefix('mission-inbound')->group(function() {
            Route::get('/', 'ToolboxController@mission_inbound');
            Route::get('/abduction', 'ToolboxController@abduction');
            Route::get('/crash', 'ToolboxController@crash');
            Route::get('/landing', 'ToolboxController@landing');
            Route::get('/council', 'ToolboxController@council');
        });
    });
});

