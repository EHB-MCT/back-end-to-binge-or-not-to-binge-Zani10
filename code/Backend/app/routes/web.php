<?php

// routes/web.php

use App\Http\Controllers\ProgressController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MaterialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [VideoController::class, 'index'])->name('home');

Route::get('/home', function () {
    return redirect()->route('videos.index');
});

Auth::routes();




Route::middleware('auth')->group(function () {

    Route::post('progress/reset/{video}', [App\Http\Controllers\ProgressController::class, 'reset'])->name('progress.reset');
    Route::post('progress/{video}', [ProgressController::class, 'update'])->name('progress.update');

    Route::post('comments', [CommentController::class, 'store'])->name('comments.store');
    Route::post('comments/store/{video}', [CommentController::class, 'store'])->name('comments.store');

    Route::post('/videos/{video}/like', [VideoController::class, 'like'])->name('videos.like');

    Route::get('/videos/search', [VideoController::class, 'search'])->name('videos.search');
    Route::resource('videos', VideoController::class)->only(['index', 'show']);



    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/edit/{user}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/update/{user}', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('categories', CategoryController::class);
    Route::get('materials/create/{video}', [MaterialController::class, 'create'])->name('materials.create');
    Route::post('materials/store/{video}', [MaterialController::class, 'store'])->name('materials.store');
    Route::get('materials/edit/{video}/{material}', [MaterialController::class, 'edit'])->name('materials.edit');
    Route::put('materials/update/{video}/{material}', [MaterialController::class, 'update'])->name('materials.update');
    Route::delete('materials/destroy/{video}/{material}', [MaterialController::class, 'destroy'])->name('materials.destroy');
});
