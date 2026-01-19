<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\StudentController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('register',[StudentAuthController::class,'showRegister']);
Route::post('register',[StudentAuthController::class,'register']);

Route::get('login',[StudentAuthController::class,'showLogin']);
Route::post('login',[StudentAuthController::class,'login']);

Route::any('logout',[StudentAuthController::class,'logout']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [StudentController::class,'dashboard']);
    Route::post('/subject/add', [StudentController::class,'addSubject']);
    Route::get('/subject/edit/{id}', [StudentController::class,'editSubject']);
    Route::post('/subject/update/{id}', [StudentController::class,'updateSubject']);
    Route::post('/subject/delete/{id}', [StudentController::class,'deleteSubject']);
});
