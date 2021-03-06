<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Type;
use App\Models\Condition;

use App\Http\Controllers\TypeController;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\WallmaterialController;

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

Route::get('/enumerations.wallmaterials.list', [WallmaterialController::class, 'index']);
Route::get('/enumerations.wallmaterials.get/{condition}', [WallmaterialController::class, 'show']);
Route::get('/enumerations.wallmaterials.add', [WallmaterialController::class, 'store']);

Route::get('/enumerations.types.list', [TypeController::class, 'index']);
Route::get('/enumerations.types.get', [TypeController::class, 'show']);
Route::get('/enumerations.types.update', [TypeController::class, 'update']);
Route::get('/enumerations.types.add', [TypeController::class, 'store']);

Route::get('/enumerations.conditions.list', [ConditionController::class, 'index']);
Route::get('/enumerations.conditions.get', [ConditionController::class, 'show']);
Route::get('/enumerations.conditions.update', [ConditionController::class, 'update']);
Route::get('/enumerations.conditions.add', [ConditionController::class, 'store']);


