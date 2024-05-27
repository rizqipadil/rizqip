<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\YourProfileController;

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
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register,save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login,action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::controller(ProfileController::class)->group(function() {
    Route::get('profile', [ProfileController::class,'profile'])->name('profile');
    Route::post('profile', [ProfileController::class,'changeProfile'])->name('profile,change');
    
});

Route::middleware(['auth'])->group(function () {
    Route::get('/change-password', [ChangePasswordController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('/change-password', [ChangePasswordController::class, 'updatePassword'])->name('password.update');
});
    Route::get('/your-profile', [YourProfileController::class, 'show'])->name('your-profile');
    Route::get('/user-data', [UserDataController::class, 'index'])->name('user.data');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
