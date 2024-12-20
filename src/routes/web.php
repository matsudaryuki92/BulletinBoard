<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

//indexぺージ
Route::get('/', [PostController::class, 'index']);
Route::post('/', [PostController::class, 'check']);
//confirmぺージ
Route::get('/confirm', [PostController::class, 'confirm']);
Route::post('/confirm', [PostController::class, 'store']);
Route::post('/confirm/fix', [PostController::class, 'fix']);

//thanksページ
Route::get('/thanks', [PostController::class, 'thanks']);

Route::patch('/update', [PostController::class, 'update']);
Route::delete('/delete', [PostController::class, 'destroy']);
Route::get('/find', [PostController::class, 'find']);
Route::post('/search', [PostController::class, 'search']);

//authの実装