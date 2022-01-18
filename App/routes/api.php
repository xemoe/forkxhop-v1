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

Route::get('/v1/status/ok', function () {
    return response()->json(['status_message' => 'ok']);
});

Route::get('/v1/status/failed', function () {
    return response()->json(['status_message' => 'failed']);
});
