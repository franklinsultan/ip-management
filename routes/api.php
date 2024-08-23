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

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
// Route::post('logout', 'AuthController@logout')->middleware('auth:api');

Route::middleware('auth:api')->group(function () {
    Route::get('ip-addresses', 'IpAddressController@index');
    Route::post('ip-addresses', 'IpAddressController@store');
    Route::get('ip-addresses/{id}',  'IpAddressController@show');
    Route::put('ip-addresses/{id}',  'IpAddressController@update');
    Route::get('audit-logs', 'AuditLogController@index');
});
