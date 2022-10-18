<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CampusController;
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

Route::prefix('campuses')->middleware('auth:sanctum')->name('campus.')->group(function () {
    Route::get('', [CampusController::class, 'fetch'])->name('fetch');
    Route::post('/{id}/follow', [CampusController::class, 'follow'])->name('follow');
    Route::get('/{id}/majors', [CampusController::class, 'major'])->name('major');
});


Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware(('auth:sanctum'));
Route::get('users', [UserController::class, 'fetch'])->middleware(('auth:sanctum'));
