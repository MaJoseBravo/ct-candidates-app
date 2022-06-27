<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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


Route::controller(TaskController::class)->prefix('tasks')->group(function () {
    Route::get('/',  'index');
    Route::post('/', 'store');
    Route::get('update/{id}', 'update')->whereNumber('id');
    Route::get('delete/{id}','destroy')->whereNumber('id');
    Route::get('filter/{filter?}','filter');
});
