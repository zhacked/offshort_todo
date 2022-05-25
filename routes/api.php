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


//user

Route::apiResources(['user' => App\Http\Controllers\API\UserController::class]);
Route::get('profile', [App\Http\Controllers\API\UserController::class, 'profile'])->name('profile');
Route::put('profile', [App\Http\Controllers\API\UserController::class, 'updateProfile'])->name('updateProfile');
Route::get('findUser', [App\Http\Controllers\API\UserController::class, 'search']);

//tech employee
Route::apiResources(['techemployee' => App\Http\Controllers\API\TechInfoController::class]);
// Route::get("search", [App\Http\Controllers\API\TechInfoController::class, 'search']);

//tasks
Route::apiResources(['tasks' => App\Http\Controllers\TaskController::class]);
Route::put('MarkAsDone/{id}', [App\Http\Controllers\TaskController::class, 'markAsDone']);





