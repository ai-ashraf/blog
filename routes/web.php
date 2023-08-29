<?php

use App\Http\Controllers\Admin\BackendController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Frontend Route Here
Route::name('frontend.')->group(function () {
    Route::get('/', [FrontendController::class, 'index'])->name('home');
    Route::get('/blog/list', [FrontendController::class, 'blogList'])->name('bloglist');
    Route::get('/blog/category/{id}', [FrontendController::class, 'blogFilter'])->name('blog.filter');
    Route::get('/blog/details/{id}', [FrontendController::class, 'blogDetails'])->name('blog.details');
});


// Backend Route Here

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::post('/comment/{id}', [FrontendController::class, 'commentStore'])->name('comments.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Admin Login Route
Route::get('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'loginSubmit'])->name('admin.login.submit');

    Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::get('/', [BackendController::class, 'index'])->name('index');
        Route::resource('categories', CategoryController::class);
        Route::resource('blogs', BlogController::class);
    });