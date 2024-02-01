<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\BlogpostController;
use Illuminate\Support\Facades\Route;

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



Route::get('/',[WelcomeController::class,'index'])->name('welcome.index');
/* blog */

Route::get('/blog',[BlogpostController::class,'index'])->name('blog.index');
//single blog

//create a blog
Route::get('/blog/create',[BlogpostController::class,'create'])->name('blog.create')->middleware('auth');
//store a blog


Route::put('/blog/{post}',[BlogpostController::class,'update'])->name('blog.update');
//store a blog
Route::delete('/blog/{post}',[BlogpostController::class,'destroy'])->name('blog.destroy');



Route::get('/blog/{post:slug}',[BlogpostController::class,'show'])->name('single-blog.show');

Route::get('blog/{post}/edit',[BlogpostController::class,'edit'])->name('blog.edit');

Route::post('/blog',[BlogpostController::class,'store'])->name('blog.store');
//store a blog


Route::get('/contact',[contactController::class,'view'])->name('contact.view');

Route::post('/contact',[contactController::class,'store'])->name('contact.store');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('/categories', CategoryController::class);

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/team', function () {
    return view('team');
})->name('team');


// Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
// Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
// Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
// Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
// Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
// Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
// Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');