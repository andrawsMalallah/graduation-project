<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\UsersController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LabsController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\TeachersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/department/{department:name}', [DepartmentsController::class, 'show'])->name('department.show');

Route::get('/teachers/{teacher:name}', [TeachersController::class, 'show'])->name('teacher.show');

Route::get('/labs/{lab:name}', [LabsController::class, 'show'])->name('lab.show');

Route::get('/search', [HomeController::class, 'search'])->name('search');

// contact from
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

// blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store')->middleware('auth');
Route::get('/blog/{blog:title}', [BlogController::class, 'show'])->name('post.show');

Route::get('/library/{department_name}', [LibraryController::class, 'index'])->name('library');

// dashboard routes
Route::prefix('dashboard')->middleware('admin')->group(function () {
    // index
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // departments
    Route::get('/departments', [DepartmentsController::class, 'index'])->name('departments');
    Route::post('/department/store', [DepartmentsController::class, 'store'])->name('department.store');
    Route::get('/department/edit/{department}', [DepartmentsController::class, 'edit'])->name('department.edit');
    Route::get('/department/image/{department}', [DepartmentsController::class, 'imageView'])->name('department.image.view');
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
    Route::delete('/lab/delete/{lab}', [LabsController::class, 'delete'])->name('lab.delete');
    Route::patch('/lab/update/{lab}', [LabsController::class, 'update'])->name('lab.update');

    // library
    Route::get('/library', [LibraryController::class, 'libraryIndex'])->name('dashboard.library');
    Route::post('/library/store', [LibraryController::class, 'store'])->name('library.store');
    Route::get('/library/edit/{library}', [LibraryController::class, 'edit'])->name('library.edit');
    Route::get('/library/image/{library}', [LibraryController::class, 'imageView'])->name('library.image.view');
    Route::patch('/library/update/{library}', [LibraryController::class, 'update'])->name('library.update');
    Route::delete('/library/delete/{library}', [LibraryController::class, 'delete'])->name('library.delete');

    // blog
    Route::get('/blog', [BlogController::class, 'blogIndex'])->name('dashboard.blog');
    Route::get('/blog/edit/{blog}', [BlogController::class, 'edit'])->name('post.edit');
    Route::patch('/blog/update/{blog}', [BlogController::class, 'update'])->name('post.update');
    Route::patch('/blog/approve/{blog}', [BlogController::class, 'approve'])->name('post.approve');
    Route::get('/blog/image/{blog}', [BlogController::class, 'imageView'])->name('post.image.view');
    Route::delete('/blog/delete/{blog}', [BlogController::class, 'delete'])->name('post.delete');

    // messages
    Route::get('/messages', [ContactController::class, 'messages'])->name('messages');
    Route::get('/message/{contact}', [ContactController::class, 'show'])->name('messages.show');
    Route::delete('/message/delete/{contact}', [ContactController::class, 'delete'])->name('messages.delete');

    // users
    Route::get('/users', [UsersController::class, 'index'])->name('dashboard.users');
    Route::patch('/user/permission/{user}', [UsersController::class, 'permission'])->name('user.permission');
    Route::delete('/users/delete/{user}', [UsersController::class, 'delete'])->name('user.delete');
});
