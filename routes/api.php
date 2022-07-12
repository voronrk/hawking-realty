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

Route::get('/enumerations.types.list', function () {
    return Type::all();
});

Route::get('/enumerations.types.get/{type}', function (Type $type) {
    return ['value' => $type->value];
});

Route::get('/enumerations.conditions.list', function () {
    return Condition::all();
});

Route::get('/enumerations.conditions.get/{condition}', function (Condition $condition) {
    return ['value' => $condition->value];
});
