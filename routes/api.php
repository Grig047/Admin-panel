<?php

use App\Http\Controllers\Admin\AboutCompanyController;
use App\Http\Controllers\Admin\BrandController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth.jwt'], function () {

    Route::post('logout', [AuthController::class, 'logout']);

});

Route::get('about_company', [AboutCompanyController::class, 'index']);
Route::get('brands', [BrandController::class, 'index']);
