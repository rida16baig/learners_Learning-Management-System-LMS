<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryController;

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

Route::get("/", [ AuthController::class, "home" ])->name("home");

Route::get('/register', [ AuthController::class, 'register' ])->name('register');
Route::post('/register', [ AuthController::class, 'register_user' ])->name('register_user');
Route::get('/login', [ AuthController::class, 'login' ])->name('login');
Route::post('/login', [ AuthController::class, 'login_user' ])->name('login_user');
Route::get('/logout', [ AuthController::class, 'logout' ])->name('logout');


// applying middleware to all sensitive routes----------------------------------//


///---------------------admin route----------------------///

Route::middleware([ 'admin' ])->group(function () {

    Route::get('/admin/dashboard', [ AuthController::class, 'admin_dashboard' ])->name('admin_dashboard');

    Route::get('/admin/all-users', [ AuthController::class, 'all_users' ])->name('all_users');
    Route::get('/admin/{id}/edit-users', [ AuthController::class, 'edit_users' ])->name('edit_users');
    Route::post('/admin/{id}/edit-users', [ AuthController::class, 'update_users' ])->name('update_users');
    Route::delete('/admin/{id}/delete', [ AuthController::class, 'delete_users' ])->name('delete_users');


    

    ///---------------------course route----------------------///

    Route::get('/create_course', [ CourseController::class, 'create_course' ])->name('create_course');
    Route::post('/create_course', [ CourseController::class, 'store_course' ])->name('store_course');
    Route::get('/all_courses', [ CourseController::class, 'all_courses' ])->name('all_courses');

    Route::get('course/{id}/edit', [ CourseController::class, 'edit_course' ])->name('edit_course');
    Route::put('course/{id}/edit', [ CourseController::class, 'update_course' ])->name('update_course');

    Route::delete('courses/{id}/delete', [ CourseController::class, 'delete_course' ])->name('delete_course');

    ///---------------------category route----------------------///

    Route::get('/create', [ CategoryController::class, 'create' ])->name('create_category');
    Route::post('/create', [ CategoryController::class, 'store_category' ])->name('store_category');
    Route::get('/all', [ CategoryController::class, 'all_category' ])->name('all_category');
    Route::get('category/{id}/edit', [ CategoryController::class, 'edit_category' ])->name('edit_category');
    Route::put('category/{id}/edit', [ CategoryController::class, 'update_category' ])->name('update_category');
    Route::delete('category/{id}/delete', [ CategoryController::class, 'delete_category' ])->name('delete_category');

});


///---------------------teacher route----------------------///

Route::middleware([ 'teacher' ])->group(function () {


    Route::get('/teacher/dashboard', [ AuthController::class, 'teacher_dashboard' ])->name('teacher_dashboard');  

    ///---------------------course route----------------------///

    Route::get('/create_course', [ CourseController::class, 'create_course' ])->name('create_course');
    Route::post('/create_course', [ CourseController::class, 'store_course' ])->name('store_course');
    Route::get('/all_courses', [ CourseController::class, 'all_courses' ])->name('all_courses');

    Route::get('course/{id}/edit', [ CourseController::class, 'edit_course' ])->name('edit_course');
    Route::put('course/{id}/edit', [ CourseController::class, 'update_course' ])->name('update_course');

    Route::delete('courses/{id}/delete', [ CourseController::class, 'delete_course' ])->name('delete_course');

    ///---------------------category route----------------------///

    Route::get('/create', [ CategoryController::class, 'create' ])->name('create_category');
    Route::post('/create', [ CategoryController::class, 'store_category' ])->name('store_category');
    Route::get('/all', [ CategoryController::class, 'all_category' ])->name('all_category');
    Route::get('category/{id}/edit', [ CategoryController::class, 'edit_category' ])->name('edit_category');
    Route::put('category/{id}/edit', [ CategoryController::class, 'update_category' ])->name('update_category');
    Route::delete('category/{id}/delete', [ CategoryController::class, 'delete_category' ])->name('delete_category');



});

Route::middleware([ 'auth' ])->group(function () {



    ///---------------------student route----------------------///
    Route::get('/student/dashboard', [ StudentController::class, 'student_dashboard' ])->name('student_dashboard');




    Route::get('/show_courses', [ CourseController::class, 'show_courses' ])->name('show_courses');



    // ---------------------course-billing---------------------------------------------

    Route::get('/course/{id}', [ CourseController::class, 'buy_course' ])->name('buy_course');
    Route::post('/course/{id}', [ CourseController::class, 'bought_course' ])->name('bought_course');

    // ---------------------course-billing---------------------------------------------

    Route::get('/show_comments', [ CommentController::class, 'show_comment' ])->name('show_comment');


    Route::post('/bought-course/{id}', [CommentController::class,'comment'])->name('comment');


});


// ---------------------course-details---------------------------------------------

Route::get('/sub_course/{id}', [ CourseController::class, 'sub_course' ])->name('sub_course');
Route::get('/detail_courses/{id}', [ CourseController::class, 'detail_courses' ])->name('detail_courses');



