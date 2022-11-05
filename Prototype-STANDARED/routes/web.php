<?php

use App\Http\Controllers\AssignerController;
use App\Http\Controllers\briefController;
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

//brief
Route::get('brief',[briefController::class,'index'])->name('brief.index');
Route::get('brief/create',[briefController::class,'create'])->name('brief.create');
Route::post('brief/store',[briefController::class,'store'])->name('brief.store');
Route::get('brief/Edit/{id}',[briefController::class,'edit'])->name('brief.edit');
Route::put('brief/update/{id}',[briefController::class,'update'])->name('brief.update');
Route::delete('brief/destroy/{id}',[briefController::class,'destroy'])->name('brief.destroy');
Route::get('brief/assigner/{id}',[briefController::class,'assigner'])->name('brief.assigner');


Route::resource('student',StudentController::class);
Route::resource('assigner',AssignerController::class);
