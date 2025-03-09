<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProjectController::class, 'index'])->name('index');


Route::get('/home', function () {
    return view('home.index');
})->name('home');

//Auth
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/signin', [AuthController::class, 'login'])->name('signin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/create', [ProjectController::class, 'create'])->name('projects.create')->middleware('auth');
Route::post('store', [ProjectController::class, 'store'])->name('projects.store')->middleware('auth');
Route::get('/edit/{project}', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/update/{project}', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/delete/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');