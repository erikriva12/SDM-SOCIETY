<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Master\UserController;
use App\Http\Controllers\API\Admin\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function ()
{
    return view('welcome');
});

// admin
Route::prefix('admin')->group(function ()
{
    Route::get('/', [AdminController::class, 'index']);
    Route::get('login', function ()
    {
        return view('admin.login');
    });
    Route::post('/action-login', [AuthController::class, 'login'])->name('actionLogin');

    Route::prefix('master')->group(function ()
    {
        Route::get('user', [UserController::class, 'index'])->name('list-user');
    });


});

