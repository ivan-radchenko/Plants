<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Livewire\auth\Login;
use App\Livewire\auth\Profile;
use App\Livewire\Home;
use App\Livewire\MyPlants;
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

Route::get('/', Home::class)
    ->name('home');

Route::middleware('guest')->group(function () {

    Route::get('/register', [RegisterController::class, 'create'])
        ->name('register');
    Route::post('/register', [RegisterController::class, 'store'])
        ->name('register');
    Route::get('/login', Login::class)
        ->name('login');
    Route::post('/login', [LoginController::class, 'login'])
        ->name('login');
    Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])
        ->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'send'])
        ->name('password.email');
    Route::get('/reset-password/{token}',[ResetPasswordController::class,'index'])
        ->name('password.reset');
    Route::post('/reset-password',[ResetPasswordController::class,'reset'])
        ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LogoutController::class, 'logout'])
        ->name('logout');
    Route::get('/profile', Profile::class)
        ->name('profile');
    Route::get('/my-plants', MyPlants::class)
        ->name('my-plants');
});
