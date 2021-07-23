<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;

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
// protected routes

Route::group(['middleware' =>['auth:api']], function(){
    Route::get('dataView', [DataController::class, 'dataView']);
    Route::post('data', [DataController::class, 'makeData']);

});

// public routes

Route::get('signup', [AuthController::class, 'signupView']);
Route::post('signup', [AuthController::class, 'signUp']);

Route::post('login', [AuthController::class, 'login']);

// Route::get('userview', [AuthController::class, 'userView']);


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     Route::get('/login', [AuthController::class, 'loginView']);
//         // return $request->user();

// });
