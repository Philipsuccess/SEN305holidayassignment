<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/admin/posts', [PostController::class, 'index']);
    Route::get('/admin/posts/create', [PostController::class, 'create']);
    Route::post('/admin/posts', [PostController::class, 'store']);
    Route::get('/admin/posts/{post}/edit', [PostController::class, 'edit']);
    Route::put('/admin/posts/{post}', [PostController::class, 'update']);
    Route::delete('/admin/posts/{post}', [PostController::class, 'destroy']);
});

Route::get('/', [PostController::class, 'publicIndex'])->name('home');
Route::get('/post/{slug}', [PostController::class, 'show']);