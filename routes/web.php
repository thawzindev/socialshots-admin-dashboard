<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentReportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::redirect('/', '/login');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::controller(PostReportController::class)->group(function () {
        Route::get('/post-reports', 'index')->name('post-reports.index');
        Route::post('/post-reports/action', 'action')->name('post-reports.action');
    });

    Route::controller(CommentReportController::class)->group(function () {
        Route::get('/comment-reports', 'index')->name('comment-reports.index');
        Route::post('/comment-reports/action', 'action')->name('comment-reports.action');
    });

    Route::controller(AdminController::class)->group(function () {
        Route::get('/admins', 'index')->name('admins.index');
        Route::delete('/admins/{user}/delete', 'destory')->name('admins.destroy');
        Route::get('/admins/register', 'create')->name('admins.create');
        Route::post('/admins/register', 'store')->name('admins.store');
    });

        Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('users.index');
        Route::patch('/users/{user}/status-toggle', 'statusToggle')->name('users.status-toggle');
    });

});

require __DIR__.'/auth.php';
