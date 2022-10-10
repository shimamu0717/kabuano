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



Route::get('/', [App\Http\Controllers\ShowController::class, 'index'])->name('home');
Route::get('/favorite', [App\Http\Controllers\ShowController::class, 'showFavorite'])->name('favorite')->middleware('auth');
Route::get('/all', [App\Http\Controllers\ShowController::class, 'showAll'])->name('show.all');

Auth::routes();
Route::prefix('login')->name('login.')->group(function () {
    Route::get('/{provider}', [App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider'])->name('{provider}');
    Route::get('/{provider}/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback'])->name('{provider.callback}');
});

Route::prefix('register')->name('register.')->group(function () {
    Route::get('/{provider}', [App\Http\Controllers\Auth\RegisterController::class, 'showProviderUserRegistrationForm'])->name('{provider}');
    Route::post('/{provider}', [App\Http\Controllers\Auth\RegisterController::class, 'registerProviderUser'])->name('{provider}');
});

Route::resource('analyze', App\Http\Controllers\AnalyzeController::class)->except('index','edit','show');
Route::post('analyze/create', [App\Http\Controllers\AnalyzeController::class, 'start'])->name('analyze.start');
Route::get('analyze', [App\Http\Controllers\AnalyzeController::class, 'result'])->name('analyze.result');

Route::prefix('analyze')->name('analyzes.')->group(function () {
    Route::put('/{analyze}/favorite', [App\Http\Controllers\AnalyzeController::class, 'favorite'])->name('favorite')->middleware('auth');
    Route::delete('/{analyze}/favorite', [App\Http\Controllers\AnalyzeController::class, 'unfavorite'])->name('unfavorite')->middleware('auth');
});
