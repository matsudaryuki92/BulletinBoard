<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware('auth')->group(function() {
    Route::get('/admin', [AuthController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout']);

    //その他:機能
    Route::patch('/update', [AuthController::class, 'update']);
    Route::delete('/delete', [AuthController::class, 'destroy']);
    Route::get('/find', [AuthController::class, 'find']);
    Route::post('/search', [AuthController::class, 'search']);
});

//indexぺージ
Route::get('/', [PostController::class, 'index']);
Route::post('/', [PostController::class, 'check']);

//confirmぺージ
Route::get('/confirm', [PostController::class, 'confirm']);
Route::post('/confirm', [PostController::class, 'store']);
Route::post('/confirm/fix', [PostController::class, 'fix']);

//thanksページ
Route::get('/thanks', [PostController::class, 'thanks']);

