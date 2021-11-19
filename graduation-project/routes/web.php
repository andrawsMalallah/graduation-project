<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\DepartmentsController;
use App\Http\Controllers\backend\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LabsController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\TeachersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

// contact from
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');

Route::get('/library', [LibraryController::class, 'index'])->name('library');

// dashboard routes
Route::prefix('dashboard')->middleware('admin')->group(function () {
    // index
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // sliders
    Route::get('/sliders', [SlidersController::class, 'index'])->name('sliders');
    Route::get('/sliders/show/{slider}', [SlidersController::class, 'show'])->name('slider.show');
    Route::post('/sliders/store', [SlidersController::class, 'store'])->name('sliders.store');
    Route::delete('/sliders/delete/{slider}', [SlidersController::class, 'delete'])->name('sliders.delete');

    // departments
    Route::get('/departments', [DepartmentsController::class, 'index'])->name('departments');
    Route::post('/department/store', [DepartmentsController::class, 'store'])->name('department.store');
    Route::get('/department/edit/{department}', [DepartmentsController::class, 'edit'])->name('department.edit');
    Route::get('/department/image/{department}', [DepartmentsController::class, 'imageView'])->name('department.image.view');
    Route::get('/department/video/{department}', [DepartmentsController::class, 'videoView'])->name('department.video.view');
    Route::get('/department/video/delete/{department}', [DepartmentsController::class, 'videoDelete'])->name('department.video.delete');
    Route::delete('/department/delete/{department}', [DepartmentsController::class, 'delete'])->name('department.delete');
    Route::patch('/department/update/{department}', [DepartmentsController::class, 'update'])->name('department.update');

    // teachers
    Route::get('/teachers', [TeachersController::class, 'index'])->name('teachers');
    Route::post('/teacher/store', [TeachersController::class, 'store'])->name('teacher.store');
    Route::get('/teacher/edit/{teacher}', [TeachersController::class, 'edit'])->name('teacher.edit');
    Route::patch('/teacher/update/{teacher}', [TeachersController::class, 'update'])->name('teacher.update');
    Route::delete('/teacher/delete/{teacher}', [TeachersController::class, 'delete'])->name('teacher.delete');

    // labs
    Route::get('/labs', [LabsController::class, 'index'])->name('labs');
    Route::post('/lab/store', [LabsController::class, 'store'])->name('lab.store');
    Route::get('/lab/edit/{lab}', [LabsController::class, 'edit'])->name('lab.edit');
    Route::get('/lab/image/{lab}', [LabsController::class, 'imageView'])->name('lab.image.view');
    Route::get('/lab/video/{lab}', [LabsController::class, 'videoView'])->name('lab.video.view');
    Route::get('/lab/video/delete/{lab}', [LabsController::class, 'videoDelete'])->name('lab.video.delete');
    Route::delete('/lab/delete/{lab}', [LabsController::class, 'delete'])->name('lab.delete');
    Route::patch('/lab/update/{lab}', [LabsController::class, 'update'])->name('lab.update');

    Route::get('/library', [LibraryController::class, 'libraryIndex'])->name('dashboard.library');

    // blog
    Route::get('/blog', [BlogController::class, 'blogIndex'])->name('dashboard.blog');
    Route::get('/blog/show/{blog}', [BlogController::class, 'show'])->name('post.show');
    Route::patch('/blog/approve/{blog}', [BlogController::class, 'approve'])->name('post.approve');
    Route::delete('/blog/delete/{blog}', [BlogController::class, 'delete'])->name('post.delete');

    // messages
    Route::get('/messages', [ContactController::class, 'messages'])->name('messages');
    Route::get('/message/{contact}', [ContactController::class, 'show'])->name('messages.show');
    Route::delete('/message/delete/{contact}', [ContactController::class, 'delete'])->name('messages.delete');

    // users
    Route::get('/users', [UsersController::class, 'index'])->name('dashboard.users');
    Route::delete('/users/delete/{user}', [UsersController::class, 'delete'])->name('user.delete');
});