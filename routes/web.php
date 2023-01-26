<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\BorrowController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AttendanceController;

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

// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');


Route::prefix('admin')->group(function(){
    Route::middleware('auth')->group(function(){
        Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/student', [StudentController::class, 'index'])->name('student');
        Route::get('/create', [StudentController::class, 'create'])->name('create');
        Route::post('/store', [StudentController::class, 'store'])->name('store');
        Route::get('/show/{id}', [StudentController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('edit');
        Route::get('getJurusan/{id}', [StudentController::class, 'getJurusan']);
        Route::get('getJurusanEdit/{id}', [StudentController::class, 'getJurusanEdit']);
        Route::post('/delete/{id}', [StudentController::class, 'destroy'])->name('destroy');
        // Route::resource('/student', StudentController::class);


        Route::resource('/category', CategoryController::class);
        Route::resource('/book', BookController::class);
        Route::resource('/staff', StaffController::class);
        Route::resource('/borrow', BorrowController::class);
        Route::resource('/admin', AdminController::class);
        Route::resource('/attendance', AttendanceController::class);
        Route::resource('/profile', ProfileController::class);

    });
});
