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

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'verified'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('events', 'EventController')->parameters(['events' => 'id']);
    Route::resource('participants', 'ParticipantController')->parameters(['participants' => 'id']);
    Route::name('api.')->group(function () {
        Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
            Route::apiResource('events', 'EventController')->only(['index']);
            Route::apiResource('participants', 'ParticipantController')->only(['index']);
        });
    });
});
