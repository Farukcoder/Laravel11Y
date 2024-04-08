<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'students'],function(){
    Route::resource('/', StudentController::class);
    Route::get('/posts', [StudentController::class, 'getPost']);
    Route::get('/roles', [StudentController::class, 'getRole']);
    Route::get('/companies', [StudentController::class, 'getCompanyInfo']);
});
Route::resource('posts', PostController::class);
Route::resource('roles', RoleController::class);

Route::get('/contacts', [ContactController::class, 'show']);
