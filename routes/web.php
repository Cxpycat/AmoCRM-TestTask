<?php

use App\Http\Controllers\AmoCrm\AccessController;
use App\Http\Controllers\AmoCrm\AuthController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/auth', \App\Http\Controllers\AuthAmoCRMController::class);
Route::get('/main', App\Http\Controllers\AmoCrm\GetController::class);
Route::get('/storeData', \App\Http\Controllers\AmoCrm\StoreDataController::class);


