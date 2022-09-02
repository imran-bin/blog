<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\AdminController;
 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/home', [AdminController::class,'index'])->name('admin.home');
    Route::get('admin/category/create', [CategoryController::class,'create'])->name('category.create');
    Route::post('admin/category/store', [CategoryController::class,'store'])->name('category.store');
    Route::get('admin/category/delete/{id}', [CategoryController::class,'delete'])->name('category.delete');
    Route::get('admin/subcategory',[SubCategoryController::class,'create'])->name('subcategory.create');
    Route::post('admin/subcategory/store',[SubCategoryController::class,'store'])->name('subcategory.store');
    Route::get('admin/subcategory/delete/{id}',[SubCategoryController::class,'delete'])->name('subcategory.delete');

});

 
