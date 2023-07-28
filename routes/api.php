<?php
use App\Http\Controllers\ArticleApiController;
use App\Http\Controllers\CategoryApiController;
use App\Http\Controllers\AuthApiController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('register', [AuthApiController::class, 'register']);
Route::post('login', [AuthApiController::class, 'login']);
Route::middleware('auth:api')->post('logout', [AuthApiController::class, 'logout']);

Route::middleware('auth:api')->prefix('v1')->group(function () {
    Route::resource('articles', ArticleApiController::class);
    Route::resource('categories', CategoryApiController::class);
});
