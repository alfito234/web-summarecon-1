<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TamuController;
use Illuminate\Auth\Events\Login;

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

Route::get('/', [HomeController::class, 'index']);


//guest
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/action-login', [LoginController::class, 'actionLogin'])->name('actionlogin');
Route::get('/action-logout', [LoginController::class, 'actionLogout'])->name('actionlogout')->middleware('auth');
Route::get('/guests', [TamuController::class, 'getGuests'])->name('guests')->middleware('auth');
Route::post('/guests', [TamuController::class, 'getGuests'])->name('filterDate')->middleware('auth');

Route::get('/register', [FormController::class, 'index']);
Route::post('/saveregister', [TamuController::class, 'saveRegister'])->name('saveregister');
