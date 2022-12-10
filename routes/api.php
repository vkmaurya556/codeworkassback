<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Todo;
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

Route::middleware('Cors', 'AuthHeader')->post("/addtodo", ['uses' => 'TodoController@add']);
Route::middleware('Cors', 'AuthHeader')->get("/display", ['uses' => 'TodoController@display']);
Route::middleware('Cors', 'AuthHeader')->post("/deletetodo", ['uses' => 'TodoController@delete']);
