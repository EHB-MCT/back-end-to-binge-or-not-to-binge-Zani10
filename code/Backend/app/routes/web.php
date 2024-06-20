<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('videos.index');
});


Route::resource('videos', VideoController::class);
Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');

Route::resource('videos', VideoController::class);
Route::resource('materials', MaterialController::class);

Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

Route::post('ratings', [RatingController::class, 'store'])->name('ratings.store');
Route::post('comments', [CommentController::class, 'store'])->name('comments.store');






