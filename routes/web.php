<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VoteController;

Route::get('/', [PostController::class, 'index'])->name('main');

Route::get('/info', [PageController::class, 'info'])->name('info')->middleware('auth');

Route::get('/create', [PostController::class, 'create'])->middleware('auth')->name('post.create');

Route::post('/posts', [PostController::class, 'store'])->middleware('auth')->name('post.store');
Route::post('/posts/{post}/vote', [VoteController::class, 'store'])->middleware('auth')->name('posts.vote');
Route::delete('/posts/{post}/vote', [VoteController::class, 'destroy'])->middleware('auth')->name('posts.vote.remove');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
