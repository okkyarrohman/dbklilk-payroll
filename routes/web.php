<?php

use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PayrollController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('/payroll', PayrollController::class);


Route::resource('/karyawan', KaryawanController::class);
