<?php

use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\CourseController;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', [CourseController::class, 'home'])->name('home');

Route::get('/about-us', [CourseController::class, 'about'])->name('about');

// name route

// post, put, delete

Route::post('/store-course', [CourseController::class,'store_course'])->name('store-course');



Route::delete('delete-course/{id}', [CourseController::class, 'delete_course'])->name('delete-course');


Route::get('edit/{id}', [CourseController::class, 'edit'])->name('edit-course');


Route::put('/update-course/{id}',[CourseController::class, 'update_course'])->name('update-course');



Route::get('admission', [AdmissionController::class, 'admission'])->name('admission');
Route::post('/store-admission', [AdmissionController::class,'store_admission'])->name('store-admission');

// Route::get('/course/{name}', function ($name) {
//     return "this course is  " . $name;
// });

// get, post, put, patch, delete


// get
// post- database new data post
// put/patch - database existing data update
// delete - database existing data delete


