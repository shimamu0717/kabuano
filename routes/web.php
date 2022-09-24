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



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::resource('analyze', App\Http\Controllers\AnalyzeController::class)->except('index','edit','show');
Route::post('analyze/create', [App\Http\Controllers\AnalyzeController::class, 'start'])->name('analyze.start');
Route::get('analyze', [App\Http\Controllers\AnalyzeController::class, 'result'])->name('analyze.result');
