<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Profile;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\CareToday;
use App\Livewire\CreatePlant;
use App\Livewire\EditPlant;
use App\Livewire\Home;
use App\Livewire\LikeOther;
use App\Livewire\MyGarden;
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
Route::get('like-other', LikeOther::class)
    ->name('like-other');

Route::middleware('guest')->group(function () {

    Route::get('/register', Register::class)
        ->name('register');
    Route::get('/login', Login::class)
        ->name('login');
    Route::get('/forgot-password', ForgotPassword::class)
        ->name('password.request');
    Route::get('/reset-password/{token}', ResetPassword::class)
        ->name('password.reset');

});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LogoutController::class, 'logout'])
        ->name('logout');
    Route::get('/profile', Profile::class)
        ->name('profile');
    Route::get('/my-garden', MyGarden::class)
        ->name('my-garden');
    Route::get('create-plant', CreatePlant::class)
        ->name('create-plant');
    Route::get('edit-plant/{plant}', EditPlant::class)->middleware('has.user.plants')
        ->name('edit-plant');
    Route::get('/care-today', CareToday::class)
        ->name('care-today');
});
