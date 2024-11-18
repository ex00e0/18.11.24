<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/reg', [UserController::class, 'show_reg'])->name('show_reg');
Route::post('/reg', [UserController::class, 'reg'])->name('reg');
Route::get('/exit', [UserController::class, 'exit'])->name('exit');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('/appl', [UserController::class, 'appl'])->name('appl');
Route::get('/show_appl', [UserController::class, 'show_appl'])->name('show_appl');
Route::post('/make_appl', [UserController::class, 'make_appl'])->name('make_appl');

// Route::group(['middleware' = ['auth', 'checkIsAdmin'] , 'prefix' = 'admin']) 

// Route::get('/appl', [UserController::class, 'appl'])->name('appl');