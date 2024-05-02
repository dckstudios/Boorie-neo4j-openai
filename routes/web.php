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

Route::prefix('usuarios')->name('usuarios.')->group(function () {
Route::get('/signup', [UserController::class, 'signupUsuario'])->name('signup');
Route::get('/register', [UserController::class, 'registerUsuario'])->name('register');
Route::get('/login', [UserController::class, 'loginUsuario'])->name('login');
});
Route::get('/dashboard', [UserController::class, 'dashboardRender']);

Route::get('/settings', [UserController::class, 'settingsRender']);

Route::prefix('settings')->name('settings.')->group(function () {
    Route::get('/settings', [UserController::class, 'settingsRender'])->name('settings');
    Route::post('/update-userinfo', [UserController::class, 'updateUserInfo'])->name('update-userinfo');
    });
Route::prefix('mesages')->name('mesages.')->group(function () {
    Route::get('/ai-chat-bot', [UserController::class, 'chatbotRender']);
    Route::get('/send', [UserController::class, 'sendMesages'])->name('send');
    Route::get('/history', [UserController::class, 'historyMesages'])->name('history');
    });



