<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'students'],function(){
    Route::resource('/', StudentController::class);
    Route::get('/posts', [StudentController::class, 'getPost']);
    Route::get('/roles', [StudentController::class, 'getRole']);
    Route::get('/companies', [StudentController::class, 'getCompanyInfo']);
    Route::get('/orders', [StudentController::class, 'latestOrder']);
    Route::get('/country_posts', [StudentController::class, 'countryWisePost']);
    Route::get('/images', [StudentController::class, 'studentWiseImage']);
});
Route::resource('posts', PostController::class);
Route::get('/post_with_comment', [PostController::class, 'postWithComment']);
Route::resource('roles', RoleController::class);
Route::resource('countries',CountryController::class);
Route::resource('videos',VideoController::class);

Route::get('/contacts', [ContactController::class, 'show']);
