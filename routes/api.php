<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Type;
use App\Models\Condition;

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

Route::get('/types', function () {
    return Type::all();
});

Route::get('/types/{type}', function (Type $type) {
    return $type->value;
});

Route::get('/conditions', function () {
    return Condition::all();
});

Route::get('/conditions/{condition}', function (Condition $condition) {
    return $condition->value;
});
