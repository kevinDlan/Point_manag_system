<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create_traning',[App\Http\Controllers\TrainingController::class, 'index'])->name('training');
Route::get('/add_partner',[App\Http\Controllers\PartnerController::class,'index'])->name('create-partner-form');
Route::post('/save_partner', [App\Http\Controllers\PartnerController::class, 'create'])->name('save-partner');
Route::get('/create_ref',[App\Http\Controllers\ReferentialController::class, 'index'])->name('create-train-ref');
Route::post('/save_ref',[App\Http\Controllers\ReferentialController::class, 'create'])->name('save-referential');
Route::post('/create_training',[App\Http\Controllers\TrainingController::class, 'create'])->name('save-training');
Route::get('/create_student',[App\Http\Controllers\StudentController::class, 'index'])->name('create-student-form');
Route::get('/save_student', [App\Http\Controllers\StudentController::class, 'create'])->name('save-student');