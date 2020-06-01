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

   
/*REGISTER ROUTE*/

Route::post('/register','RegisterController@register');

/*LOGIN ROUTE */

Route::post('/login','LoginController@login');

/* LOGOUT ROUTE */

Route::post('/logout','LoginController@logout');
/* SERVICE ROUTE */
Route::get('/services', 'API\ServiceController@index');
    

