<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post("register",[\App\Http\Controllers\ApiAuthController::class,"register"]);
Route::post("auth",[\App\Http\Controllers\ApiAuthController::class,"token"]);
Route::post("logout",[\App\Http\Controllers\ApiAuthController::class,"logout"]);
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('resume/create',[\App\Http\Controllers\ResumeController::class,'store']);
    Route::post('company/create',[\App\Http\Controllers\CompanyController::class,'store']);
    Route::post('vacancy/create',[\App\Http\Controllers\VacancyController::class,'store']);

    Route::post('resume/delete/{id}',[\App\Http\Controllers\ResumeController::class,'destroy']);
    Route::post('vacancy/delete/{id}',[\App\Http\Controllers\VacancyController::class,'destroy']);
    Route::post('company/delete/{id}',[\App\Http\Controllers\CompanyController::class,'destroy']);
});

Route::get('resume/{resume}',[\App\Http\Controllers\ResumeController::class,'show']);
Route::get('company/{company}',[\App\Http\Controllers\CompanyController::class,'show']);
Route::get('vacancy/{vacancy}',[\App\Http\Controllers\VacancyController::class,'show']);

Route::get('resume',[\App\Http\Controllers\ResumeController::class,'index']);
Route::get('company',[\App\Http\Controllers\CompanyController::class,'index']);
Route::get('vacancy',[\App\Http\Controllers\VacancyController::class,'index']);



// Доделать если время хватит
Route::get('resume/tag-find/{tag:slug}',[\App\Http\Controllers\ResumeController::class,'findByTag']);
Route::get('resume/find/{substr:slug}',[\App\Http\Controllers\ResumeController::class,'findResume']);
Route::get('company/find/{substr:slug}',[\App\Http\Controllers\CompanyController::class,'findResume']);

