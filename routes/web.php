<?php

use App\Http\Controllers\RoutersIpController;
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

Route::get('/', function () 
{
    return view('index');
});

Auth::routes();

// php artisan make:controller rnameController --ressource
// php artisan make:model mName -c -r --resource=
// Route::resource('rname', rnameController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create_traning',[App\Http\Controllers\TrainingController::class, 'index'])->name('training');
Route::get('/add_partner',[App\Http\Controllers\PartnerController::class,'index'])->name('create-partner-form');
Route::post('/save_partner', [App\Http\Controllers\PartnerController::class, 'create'])->name('save-partner');
Route::get('/create_ref',[App\Http\Controllers\ReferentialController::class, 'index'])->name('create-train-ref');
Route::post('/save_ref',[App\Http\Controllers\ReferentialController::class, 'create'])->name('save-referential');
Route::post('/create_training',[App\Http\Controllers\TrainingController::class, 'create'])->name('save-training');
Route::get('/create_student',[App\Http\Controllers\StudentController::class, 'index'])->name('create-student-form');
Route::post('/save_student', [App\Http\Controllers\StudentController::class, 'create'])->name('save-student');
Route::get('/password_set_form',[App\Http\Controllers\StudentController::class,'passwordSet'])->name('password-set-form');
Route::post('/password-set',[App\Http\Controllers\StudentController::class, 'modif_password'])->name('change-password');
Route::get('/register_',[App\Http\Controllers\RegisterController::class, 'index'])->name('register-view');
Route::post('/register_save',[App\Http\Controllers\RegisterController::class,'create'])->name('register_save');
Route::resource('router_ip', RoutersIpController::class);
Route::get('register_list',[App\Http\Controllers\StudentController::class,'registerList'])->name('register-list');
Route::get('/presence_list',[App\Http\Controllers\HomeController::class,'presenceList'])->name('presence-liste');
Route::get('/search_data_by_date/{date}',[App\Http\Controllers\HomeController::class, 'search'])->name('fetch-date-data');
Route::get('/student_list',[App\Http\Controllers\HomeController::class, 'studentList'])->name('student-list');
Route::get('/create_instructor', [App\Http\Controllers\InstructorController::class, 'index'])->name('create-instructor-form');
Route::post('/save_instructor',[App\Http\Controllers\InstructorController::class, 'store'])->name('save-instructor');
Route::get('/search_student_by_train/{id}', [App\Http\Controllers\HomeController::class, 'getStudentByTraining']);
Route::post('/mail_verif',[App\Http\Controllers\EmailVerifController::class,'verifEmail'])->name('mail-verif');
Route::get('/face_login_verif',[App\Http\Controllers\EmailVerifController::class,'index'])->name('face-login');