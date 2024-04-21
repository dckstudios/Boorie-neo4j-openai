<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\UserController;

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
Route::get('/', [UserController::class, 'loginUsuario']);
Route::prefix('messages')->name('messages.')->group(function () {
Route::get('/send', [UserController::class, 'sendMessages'])->name('send');
Route::get('/history', [UserController::class, 'historyMessages'])->name('history');
});
Route::prefix('usuarios')->name('usuarios.')->group(function () {
Route::get('/signup', [UserController::class, 'signupUsuario'])->name('signup');
Route::get('/register', [UserController::class, 'registerUsuario'])->name('register');
Route::get('/login', [UserController::class, 'loginUsuario'])->name('login');
});


