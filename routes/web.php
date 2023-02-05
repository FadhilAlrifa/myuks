<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\ArticleResourceController;
use App\Http\Controllers\StudentController;
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

Route::get('/', [BerandaController::class, 'index'])->name('login');

// Article
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/{article:slug}', [ArticleController::class, 'show']);

Route::get('/articles/admin/add', [ArticleController::class, 'create'])->middleware('admin');
Route::post('/articles/admin/add', [ArticleController::class, 'store'])->middleware('admin');

Route::get('/articles/{article:slug}/edit', [ArticleController::class, 'edit'])->middleware('admin');
Route::put('/articles/{article:slug}', [ArticleController::class, 'update'])->middleware('admin');

Route::get('/articles/{article:slug}/delete', [ArticleController::class, 'delete'])->middleware('admin');
Route::delete('/articles/{article:slug}/delete', [ArticleController::class, 'destroy'])->middleware('admin');
// Article End


// Patient
Route::get('/patients/add', [StudentController::class, 'create'])->middleware('admin');
Route::post('/patients/add', [StudentController::class, 'store'])->middleware('admin');

Route::get('/patients/{student:slug}/edit', [StudentController::class, 'edit'])->middleware('admin');
Route::put('/patients/{student:slug}', [StudentController::class, 'update'])->middleware('admin');
// Patient End


// Hospital
Route::get('/hospitals', [HospitalController::class, 'index']);

Route::get('/hospitals/admin/add', [HospitalController::class, 'create'])->middleware('admin');
Route::post('/hospitals/admin/add', [HospitalController::class, 'store'])->middleware('admin');

Route::get('/hospitals/{hospital:slug}/edit', [HospitalController::class, 'edit'])->middleware('admin');
Route::put('/hospitals/{hospital:slug}', [HospitalController::class, 'update'])->middleware('admin');

Route::get('/hospitals/{hospital:slug}/delete', [HospitalController::class, 'delete'])->middleware('admin');
Route::delete('/hospitals/{hospital:slug}/delete', [HospitalController::class, 'destroy'])->middleware('admin');
// Hospital End


// Medicine
Route::get('/medicines', [MedicineController::class, 'index']);
Route::get('/medicines/{medicine:slug}', [MedicineController::class, 'show']);

Route::get('/medicines/admin/add', [MedicineController::class, 'create'])->middleware('admin');
Route::post('/medicines/admin/add', [MedicineController::class, 'store'])->middleware('admin');

Route::get('/medicines/{medicine:slug}/edit', [MedicineController::class, 'edit'])->middleware('admin');
Route::put('/medicines/{medicine:slug}', [MedicineController::class, 'update'])->middleware('admin');

Route::get('/medicines/{medicine:slug}/delete', [MedicineController::class, 'delete'])->middleware('admin');
Route::delete('/medicines/{medicine:slug}/delete', [MedicineController::class, 'destroy'])->middleware('admin');
// Medicine End


Route::get('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('admin');

Route::get('/welcome', function () {
    return view('welcome');
});
