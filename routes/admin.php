<?php

use App\Http\Controllers\Admin\AboutCompanyController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['role:admin'])->prefix('admin_page')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home_admin');
    Route::resources([
        'users' => UserController::class,
    ]);
    Route::get('/about_company', [AboutCompanyController::class, 'index'])->name('about_company_create');
    Route::post('/about_company/{id}', [AboutCompanyController::class, 'update'])->name('about_company_store');
    Route::get('/brand', [BrandController::class, 'index'])->name('brand_index');
    Route::get('/brand/create', [BrandController::class, 'create'])->name('brand_create');
    Route::post('/brand/store', [BrandController::class, 'store'])->name('brand_store');
    Route::get('/brand/{id}', [BrandController::class, 'edit'])->name('brand_edit');
    Route::post('/brand/change_active', [BrandController::class, 'changeActive'])->name('brand_changeActive');
    Route::post('/brand/update', [BrandController::class, 'update'])->name('brand_update');
    Route::delete('/brand/delete/{id}', [BrandController::class, 'destroy'])->name('brand_destroy');
});
