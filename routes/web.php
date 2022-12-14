<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\KaweController;
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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    // User Management All Router
    Route::prefix('users')->group(function () {
        Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
        Route::get('/add', [UserController::class, 'UserAdd'])->name('user.add');
        Route::post('/store', [UserController::class, 'UserStore'])->name('user.store');
        Route::get('/{id}/edit', [UserController::class, 'UserEdit'])->name('user.edit');
        Route::post('/{id}/edit', [UserController::class, 'UserUpdate'])->name('user.update');
        Route::get('/{id}/delete', [UserController::class, 'UserDelete'])->name('user.delete');
    });

    // User Management All Router
    Route::prefix('profile')->group(function () {
        Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
        Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
    });

    // Kawe
    Route::prefix('kawe')->group(function () {
        Route::get('/view', [KaweController::class, 'KaweView'])->name('kawe.view');
        Route::get('/edit', [KaweController::class, 'KaweEdit'])->name('kawe.edit');
    });
});

Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');
