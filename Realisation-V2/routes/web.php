<?php

use App\Http\Controllers\AssignerController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\briefController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return view('Master');
});


Route::get('/test',[PromotionController::class,'edit']);



Route::resource('brief',briefController::class);
Route::get('searchBrief',[briefController::class,'search'])->name("brief.search");


// Base controller
Route::post('sessionDelete',[BaseController::class,'sessionDelete']);




// Route::resource('student',StudentController::class);

Route::resource('assigner',AssignerController::class);
Route::get('/assignerAll/{id}',[AssignerController::class,'assignerAll'])->name('assigner.All');


Route::resource('promotion',PromotionController::class);
Route::get('search',[SearchController::class,'search'])->name("promotion.search");




Route::resource('task',TasksController::class);
Route::get('searchTasks/{id}',[TasksController::class,'searchTasks'])->name('task.search');


// student controller
Route::get('/student/index',[StudentController::class,'index'])->name('student.index');
Route::get('/student/create/{id}',[StudentController::class,'create'])->name('student.create');
Route::post('/student/store',[StudentController::class,'store'])->name('student.store');
Route::get('/student/Edit/{id}',[StudentController::class,'edit'])->name('student.edit');
Route::put('/student/update/{id}',[StudentController::class,'update'])->name('student.update');
Route::delete('/student/Delete/{id}',[StudentController::class,'destroy'])->name('student.destroy');

Route::get('searchStudent/{id}',[StudentController::class,'searchStudent']);
