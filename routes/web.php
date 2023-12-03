<?php

use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\StudentClassController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\TeacherWiseClassController;
use App\Http\Controllers\Admin\UserController;
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

//Frontend Route
// Route::get('/', [HomeController::class, 'home']);
// Route::get('user/login', [HomeController::class, 'login'])->name('user.login.get');
// Route::get('user/register', [HomeController::class, 'register'])->name('user.register.get');
// Route::group(['middleware' => 'auth'], function () {
//     Route::controller(HomeController::class)->group(function () {
//         Route::get('/dashboard', 'getDashboard')->name('dashboard');
//         Route::get('/profile', 'getProfile')->name('profile');
//         Route::get('/logout', 'logout')->name('user.logout');
//     });
// });

//Admin Routes
Route::redirect('/admin', 'admin/dashboard');
Route::group(['prefix' => 'admin'], function () {
    Route::get('login', [AdminDashboard::class, 'login'])->name('admin.login.get');
    Route::post('login', [AdminDashboard::class, 'authenticate'])->name('admin.login.post');
    Route::group(['middleware' => ['auth', 'checkAdmin']], function () {
        Route::controller(AdminDashboard::class)->group(function () {
            Route::get('/dashboard', 'getDashboard')->name('admin.dashboard');
            Route::get('/profile', 'getProfile')->name('admin.profile');
            Route::get('/logout', 'logout')->name('admin.logout');
        });
        Route::resource('users', UserController::class);
        Route::resource('teachers', TeacherController::class);
        Route::resource('student-class', StudentClassController::class);
        Route::resource('notice', NoticeController::class);
        Route::resource('subject', SubjectController::class);
        Route::resource('assign-teacher', TeacherWiseClassController::class);
    });
});

//Vendor Routes
// Route::redirect('/expert', 'expert/dashboard');
// Route::group(['prefix' => 'expert'], function () {
//     Route::get('login', [VendorDashboard::class, 'login'])->name('vendor.login.get');
//     Route::post('login', [VendorDashboard::class, 'authenticate'])->name('vendor.login.post');
//     Route::group(['middleware' => ['auth', 'checkVendor']], function () {
//         Route::controller(VendorDashboard::class)->group(function () {
//             Route::get('/dashboard', 'getDashboard')->name('vendor.dashboard');
//             Route::get('/profile', 'getProfile')->name('vendor.profile');
//             Route::get('/logout', 'logout')->name('vendor.logout');
//         });
//     });
// });

include('artisan.php');
