<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ReviewController;
use App\Models\Permission;
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

Route::group(['namespace' => 'Api'], function () {
    Route::group(['namespace' => 'Auth'], function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('register', [AuthController::class, 'register']);
    });
});

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::get('reviews', [ReviewController::class, 'index'])
        ->middleware('permission:' . Permission::PERMISSIONS['reviews:read']);;
    Route::post('review', [ReviewController::class, 'post'])
        ->middleware('permission:' . Permission::PERMISSIONS['review:save']);
    Route::post('comment', [CommentController::class, 'post'])
        ->middleware('permission:' . Permission::PERMISSIONS['review-comment:save']);
});
