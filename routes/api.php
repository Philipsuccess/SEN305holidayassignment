<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostApiController;
use App\Http\Controllers\Api\AuthController;
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


Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth:api');
Route::get('/auth/profile', [AuthController::class, 'profile'])->middleware('auth:api');

Route::get('/posts', [PostApiController::class, 'index']);
Route::get('/posts/{slug}', [PostApiController::class, 'show']);
Route::get('/posts/{slug}/comments', [PostApiController::class, 'comments']);
Route::post('/posts/{slug}/comments', [PostApiController::class, 'storeComment']);

Route::middleware('auth:api')->group(function () {
    Route::post('/admin/posts', [PostController::class, 'store']);
    Route::put('/admin/posts/{post}', [PostController::class, 'update']);
    Route::delete('/admin/posts/{post}', [PostController::class, 'destroy']);
    });
