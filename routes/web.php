<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\TwoFactorAuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login');
    // return view('welcome');
});

Auth::routes();
Route::get('two-factor-authentication', [TwoFactorAuthController::class, 'index'])->name('check2fa.index');
Route::post('two-factor-authentication', [TwoFactorAuthController::class, 'store'])->name('check2fa.store');
Route::get('two-factor-authentication/resend', [TwoFactorAuthController::class, 'resend'])->name('check2fa.resend');
Route::middleware(['check2fa'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group(['middleware' => ['auth'],'prefix'=>'admin','as'=>'admin.'], function() {
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
    });
});
