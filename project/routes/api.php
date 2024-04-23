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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("register",[\App\Http\Controllers\ApiAuthController::class,"register"]);
Route::post("auth",[\App\Http\Controllers\ApiAuthController::class,"token"]);
Route::post("auth",[\App\Http\Controllers\ApiAuthController::class,"logout"]);
//Route::post("register",[\App\Http\Controllers\Auth\RegisteredUserController::class,"store"]);
//Route::post("auth",[\App\Http\Controllers\Auth\AuthenticatedSessionController::class,"store"]);
Route::middleware('auth:sanctum')->post('resume/create',[\App\Http\Controllers\ResumeController::class,'store']);
Route::middleware('auth:sanctum')->post('company/create',[\App\Http\Controllers\CompanyController::class,'store']);


Route::middleware('auth:sanctum')->post('resume/delete/{id}',[\App\Http\Controllers\ResumeController::class,'destroy']);
Route::middleware('auth:sanctum')->post('company/delete/{id}',[\App\Http\Controllers\CompanyController::class,'destroy']);

Route::get('resume/{id}',[\App\Http\Controllers\ResumeController::class,'show']);
Route::get('company/{id}',[\App\Http\Controllers\CompanyController::class,'show']);

Route::get('resume',[\App\Http\Controllers\ResumeController::class,'index']);
Route::get('company',[\App\Http\Controllers\CompanyController::class,'index']);


Route::get('resume/tag-find/{tag:slug}',[\App\Http\Controllers\ResumeController::class,'findByTag']);
Route::get('company/tag-find/{tag:slug}',[\App\Http\Controllers\CompanyController::class,'findByTag']);

Route::get('resume/tag-find/{substr:slug}',[\App\Http\Controllers\ResumeController::class,'findResume']);
Route::get('company/tag-find/{substr:slug}',[\App\Http\Controllers\CompanyController::class,'findResume']);

