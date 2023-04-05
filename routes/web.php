<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

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


Route::view('/', 'layouts.homePage')->name('homePage');

Route::get('/dashboard', function () {
    return view('layouts.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('posts', PostController::class);
Route::get('/posts', [PostController::class, 'index'])->name('posts_list.index');

Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts_list.show');

Route::middleware('auth')->group(function () {
    /* --->> concaténation route PROFILE <<--- */
    Route::name('profile.')->group(function(){
        Route::get('/profile', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('destroy');   
    });
    /* --->> concaténation route POST_LIST <<--- */
    Route::name('posts_list.')->group(function(){
        Route::get('/posts/create', [PostController::class, 'create'])->name('create');
        Route::post('/posts/create', [PostController::class, 'store'])->name('store');
    });

});

require __DIR__.'/auth.php';
