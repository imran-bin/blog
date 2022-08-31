<?php

use Illuminate\Support\Facades\Route;
 



Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/home',function(){
        return view('Admin.home');
    })->name('admin.home');
    
});

 
