<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\Admin\CafeController as AdminCafeController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;

// Route login admin
Route::get('admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Route publik (tidak perlu login)
Route::get('/', [CafeController::class, 'index'])->name('home');
Route::get('/cafes', [CafeController::class, 'index'])->name('cafes.index');
Route::get('/cafes/{id}', [CafeController::class, 'show'])->name('cafes.show');
Route::get('/search', [CafeController::class, 'search'])->name('cafes.search');

// Route user (perlu login)
Route::middleware('auth')->group(function () {
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
    Route::post('/bookmarks/{cafe_id}', [BookmarkController::class, 'toggle'])->name('bookmarks.toggle');
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route admin (perlu login admin guard)
Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('cafes', AdminCafeController::class);
    Route::resource('categories', AdminCategoryController::class);
    Route::get('reviews', [AdminReviewController::class, 'index'])->name('reviews.index');
    Route::delete('reviews/{id}', [AdminReviewController::class, 'destroy'])->name('reviews.destroy');
});

require __DIR__.'/auth.php';