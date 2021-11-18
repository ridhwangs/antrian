<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [App\Http\Controllers\AntrianController::class, 'index'])->name('antrian.view');
Route::resource('/antrian', '\App\Http\Controllers\AntrianController');

Route::resource('/dashboard', '\App\Http\Controllers\DashboardController');
Route::get('/dashboard/call/{id}', [App\Http\Controllers\DashboardController::class, 'call'])->name('dashboard.call');
Route::get('/dashboard/ajax/call', [App\Http\Controllers\DashboardController::class, 'ajax'])->name('dashboard.ajax');