<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\DepartmentsController;
use App\Http\Controllers\backend\UsersController;
use App\Http\Controllers\LabsController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\TeachersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//
//
use App\Http\Controllers\ContactUsFormController;
//
//

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
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('frontend.welcome');
});

Route::post('/contactus', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');

Auth::routes();

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/library', [LibraryController::class, 'index'])->name('library');



// dashboard routes
Route::prefix('dashboard')->middleware('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/sliders', [SlidersController::class, 'index'])->name('sliders');
    Route::get('/departments', [DepartmentsController::class, 'index'])->name('departments');
    Route::get('/labs', [LabsController::class, 'index'])->name('labs');
    Route::get('/teachers', [TeachersController::class, 'index'])->name('teachers');
    Route::get('/library', [LibraryController::class, 'libraryIndex'])->name('dashboard.library');
    Route::get('/blog', [BlogController::class, 'blogIndex'])->name('dashboard.blog');
    Route::get('/users', [UsersController::class, 'index'])->name('dashboard.users');
});
