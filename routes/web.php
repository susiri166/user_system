<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminhome'])->name('admin.home');


    });

    Route::middleware(['auth', 'user-access:superadmin'])->group(function () {
    Route::get('/superadmin/home', [HomeController::class, 'superadminHome'])->name('superadmin.home');
    Route::get('/superadmin/home/edit',[HomeController::class,'editData'])->name('superadmin.edit');
    Route::post('/superadmin/home/update',[HomeController::class,'updateData'])->name('superadmin.update');

    });

    Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/user/home', [HomeController::class, 'userhome'])->name('user.home');
    });
