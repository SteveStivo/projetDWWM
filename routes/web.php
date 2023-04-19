<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use Illuminate\Database\PDO\PostgresDriver;

Route::view('/', 'layouts.homePage')->name('homePage');
/*Route::resource('posts', PostController::class);*/
Route::get('/dashboard', function () {
    return view('layouts.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    /* --->> concaténation route PROFILE <<--- */
    Route::name('profile.')->controller(ProfileController::class)->group(function(){
        Route::get('/profile', 'edit')->name('edit');
        Route::patch('/profile', 'update')->name('update');
        Route::delete('/profile', 'destroy')->name('destroy');   
    });
    /* --->> concaténation route POSTS_LIST <<--- */
    Route::name('posts_list.')->group(function(){
        Route::get('/posts/create', [PostController::class, 'create'])->name('create');
        Route::post('/posts/create', [PostController::class, 'store'])->name('store');
        Route::get('/posts/list', [PostController::class, 'index'])->name('index');
        Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('editPost');
        Route::put('/posts/{post}', [PostController::class, 'update'])->name('update');
        Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('delete');
    });    
    /* --->> concaténation route EVENTS_LIST <<--- */
    Route::name('events_list.')->group(function(){
        Route::get('/events/create', [EventController::class, 'create'])->name('create');
        Route::post('/events/create', [EventController::class, 'store'])->name('store');
        Route::get('/events/list', [EventController::class, 'index'])->name('index');
        Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('editEvent');
        Route::put('/events/{event}', [EventController::class, 'update'])->name('update');
        Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('delete');
    });
});
Route::get('/posts', [PostController::class, 'index'])->name('posts_list.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts_list.show');

Route::get('/events', [EventController::class, 'index'])->name('events_list.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events_list.show');
require __DIR__.'/auth.php';
