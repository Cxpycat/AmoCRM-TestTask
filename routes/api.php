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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['namespace' => 'App\Http\Controllers\AmoCrm','prefix' => 'amocrm'],function (){
    Route::group(['namespace' => 'Lead', 'prefix' => 'lead'], function () {
        Route::get('/', 'IndexController');
        Route::post('/', 'StoreController');
    });
    Route::group(['namespace' => 'Company', 'prefix' => 'company'], function () {
        Route::get('/', 'IndexController');
        Route::post('/', 'StoreController');
    });
    Route::group(['namespace' => 'Contact', 'prefix' => 'contact'], function () {
        Route::post('/', 'StoreController');
        Route::get('/', 'IndexController');
    });
});


