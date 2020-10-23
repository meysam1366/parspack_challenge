<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::namespace('API')->group(function () {
    Route::post('/signup','APIController@signUp');
    Route::post('/login','APIController@login');
    Route::get('/getListPs','APIController@getListPs');
    Route::middleware('auth:sanctum')->group(function() {
        Route::post('/createDirectory', 'APIController@createDirectoryByNameUser');
        Route::post('/createFile', 'APIController@createFileByNameUser');
    });
    Route::get('/getDirectories', 'APIController@getAllDirectories');
    Route::get('/getFiles', 'APIController@getAllFiles');
});
