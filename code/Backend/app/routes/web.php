<?php

// routes/web.php

use App\Http\Controllers\VideoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MaterialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [VideoController::class, 'index'])->name('home');
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();

Route::post('/videos/{video}/like', [VideoController::class, 'like'])->name('videos.like');

Route::get('/videos/search', [VideoController::class, 'search'])->name('videos.search');
Route::resource('videos', VideoController::class)->only(['index', 'show']);
Route::post('comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

Route::resource('categories', CategoryController::class);
Route::get('materials/create/{video}', [MaterialController::class, 'create'])->name('materials.create');
Route::post('materials/store/{video}', [MaterialController::class, 'store'])->name('materials.store');
Route::get('materials/edit/{video}/{material}', [MaterialController::class, 'edit'])->name('materials.edit');
Route::put('materials/update/{video}/{material}', [MaterialController::class, 'update'])->name('materials.update');
Route::delete('materials/destroy/{video}/{material}', [MaterialController::class, 'destroy'])->name('materials.destroy');
