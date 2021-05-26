<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TeacherController;

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
    return view('login');
});
Route::get('logout', [SessionController::class,'logout']);
Route::post('get_logged', [SessionController::class,'login']);

Route::group(['middleware' => 'isadmin'], function(){
     Route::get('dashboard', [AdminController::class,'index']);
     Route::get('all-courses', [CourseController::class,'index']);
     Route::get('create-course', [CourseController::class,'create']);
     Route::post('add-course', [CourseController::class,'add']);
     Route::get('all-courses', [CourseController::class,'allcourses']);
     Route::get('edit-course/{id}',[CourseController::class,'edit']);
     Route::post('update-course/{id}',[CourseController::class,'update']);
     Route::get('delete-course/{id}',[CourseController::class,'delete']);
     Route::get('all-sessions',[SessionController::class,'index']);
     Route::get('create-session',[SessionController::class,'create']);
     Route::post('add-session',[SessionController::class,'add']);
     Route::get('edit-session/{id}',[SessionController::class,'edit']);
     Route::post('update-session/{id}',[SessionController::class,'update']);
     Route::get('delete-session/{id}',[SessionController::class,'delete']);

     Route::get('all-sections',[SectionController::class,'index']);
     Route::get('create-section',[SectionController::class,'create']);
     Route::post('add-section',[SectionController::class,'add']);
     Route::get('edit-section/{id}',[SectionController::class,'edit']);
     Route::post('update-section/{id}',[SectionController::class,'update']);
     Route::get('delete-section/{id}',[SectionController::class,'delete']);

     Route::get('all-teachers',[TeacherController::class,'index']);
     Route::get('create-teacher',[TeacherController::class,'create']);
     Route::post('add-teacher',[TeacherController::class,'store']);

});
