<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('admin', function(){
        return view('admin.index');
    })->name('admin');

    Route::resource('post', PostController::class);

    Route::get('post/all/archived', [PostController::class, 'archived'])->name('post.archived');
    Route::get('post/all/archived/restore/{id}', [PostController::class, 'restore'])->name('post.restore');
    Route::get('post/all/archived/forceDelete/{id}', [PostController::class, 'forceDelete'])->name('post.forceDelete');

    Route::resource('category', CategoryController::class);

});



require __DIR__.'/auth.php';
