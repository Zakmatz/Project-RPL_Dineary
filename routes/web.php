<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\CafeController as AdminCafeController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

// Route login & register (hanya untuk yang belum login)
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showUserLogin'])->name('login');
    Route::post('login', [AuthController::class, 'userLogin']);
    Route::get('register', [App\Http\Controllers\Auth\RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [App\Http\Controllers\Auth\RegisteredUserController::class, 'store']);
});

// Route login admin
Route::get('admin/login', [AuthController::class, 'showAdminLogin'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'adminLogin'])->name('admin.login.post');
Route::post('admin/logout', [AuthController::class, 'adminLogout'])->name('admin.logout');

// Route publik utama (Home)
// Jika user sudah login, arahkan paksa ke user.dashboard. Jika belum, tampilkan beranda guest.
Route::get('/', function () {
    if (Auth::guard('web')->check()) {
        return redirect()->route('user.dashboard');
    }
    return app(CafeController::class)->index(request());
})->name('home');

Route::get('/cafes', [CafeController::class, 'index'])->name('cafes.index');
Route::get('/cafes/{id}', [CafeController::class, 'show'])->name('cafes.show');
Route::get('/search', [CafeController::class, 'search'])->name('cafes.search');

// Route user (perlu login)
Route::middleware('auth')->group(function () {
    // Dashboard User
    Route::get('/dashboard', [CafeController::class, 'userDashboard'])->name('user.dashboard');

    // Halaman Dashboard Profil User (Menampilkan profil & riwayat ulasan)
    Route::get('/profile/dashboard', function () {
        $user = auth()->user()->load('reviews.cafe');
        return view('profile.dashboardprofile', compact('user'));
    })->name('profile.dashboard');

    // Review & Bookmark
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
    Route::post('/bookmarks/{cafe_id}', [BookmarkController::class, 'toggle'])->name('bookmarks.toggle');

    // Pengaturan Profil
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('logout', [AuthController::class, 'userLogout'])->name('logout')->middleware('auth');

// Route admin (perlu login admin guard)
Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('cafes', AdminCafeController::class);
    Route::resource('categories', AdminCategoryController::class);
    Route::get('reviews', [AdminReviewController::class, 'index'])->name('reviews.index');
    Route::delete('reviews/{id}', [AdminReviewController::class, 'destroy'])->name('reviews.destroy');
});
