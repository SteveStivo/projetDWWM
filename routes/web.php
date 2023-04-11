<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashPostController;

Route::view('/', 'layouts.homePage')->name('homePage');

Route::get('/dashboard', function () {
    return view('layouts.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/posts', [PostController::class, 'index'])->name('posts_list.index');
Route::middleware('auth')->group(function () {
    
    /* --->> concaténation route PROFILE <<--- */
    Route::name('profile.')->controller(ProfileController::class)->group(function(){
        Route::get('/profile', 'edit')->name('edit');
        Route::patch('/profile', 'update')->name('update');
        Route::delete('/profile', 'destroy')->name('destroy');   
    });
    /* --->> concaténation route POST_LIST <<--- */
    Route::name('posts_list.')->group(function(){
        Route::get('/posts/edit', [DashPostController::class, 'index'])->name('edit');
        Route::patch('/posts/edit', [PostController::class, 'update'])->name('update');
        Route::get('/posts/create', [PostController::class, 'create'])->name('create');
        Route::post('/posts/create', [PostController::class, 'store'])->name('store');
    });
});
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts_list.show');
require __DIR__.'/auth.php';
