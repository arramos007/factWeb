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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:api')->get('/logout', function(Request $request){
    $token = $request->user()->token();
    $token->revoke();
    $response = ['message' => 'Usted a finalizado la session satisfactoriamente'];
    return response($response, 200);
});

Route::post('login',[AuthController::class, 'login']);
Route::post('register',[AuthController::class, 'register']);
