<?php

use Illuminate\Http\Request;
use App\Http\API\UserController;

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

Route::apiResource('users', 'API\\UserController');
Route::apiResource('userroles', 'API\\UserRoleController')->only('index', 'show');
Route::apiResource('users.addresses', 'API\\AddressController');
