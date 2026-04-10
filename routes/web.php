<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.welcome');
})->name('welcome');

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::patch('/{id}/role', [UserController::class, 'updateRole'])->name('users.updateRole');
    });
    Route::resource('users', UserController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return view('profile.show');
    })->name('profile.show');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('news')->group(function () {
        Route::get('/drafts', [NewsController::class, 'drafts'])->name('news.drafts');
        Route::get('/comments', [NewsController::class, 'comments'])->name('news.comments');
        Route::patch('/{id}/publish', [NewsController::class, 'publish'])->name('news.publish');
    });

    Route::resource('news', NewsController::class);

    Route::resource('categories', CategoryController::class);

    Route::delete('/comments/{id}', [NewsController::class, 'destroyComment'])->name('comments.destroy');

    Route::patch('/comments/{id}/approve', [NewsController::class, 'approveComment'])->name('comments.approve');

    Route::get('/setting', function () {
        return view('pages.setting');
    })->name('setting');
});

require __DIR__.'/auth.php';
