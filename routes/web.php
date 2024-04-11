<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Admin\EditUser;
use App\Livewire\Admin\Email;
use App\Livewire\Admin\Plants;
use App\Livewire\Admin\Users;
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
use App\Livewire\SharePlant;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
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
Route::get('/share-plant/{plant}', SharePlant::class)
    ->name('share-plant')->middleware('signed:relative');

Route::middleware('guest')->group(function () {
    Route::get('/register', Register::class)
        ->name('register');
    Route::get('/login', Login::class)
        ->name('login');
    Route::get('/{driver}/redirect', [Login::class,'socialRedirect'])
        ->name('social.login');
    Route::get('/{driver}/callback',[Login::class,'socialCallback']);
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

    Route::middleware('isAdmin')->group(function (){
        Route::get('/admin/users', Users::class)
            ->name('admin.users');
        Route::get('/admin/edit-user/{user}', EditUser::class)
            ->name('admin.edit.user');
        Route::get('/admin/plants', Plants::class)
            ->name('admin.plants');
        Route::get('/admin/edit-plant/{plant}', \App\Livewire\Admin\EditPlant::class)
            ->name('admin.edit.plant');
        Route::get('/admin/email', Email::class)
            ->name('admin.email');
    });
});
