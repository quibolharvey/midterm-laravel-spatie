<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\DetailController;




Route::get('/', [ProjectController::class, 'index'])->name('index');


Route::get('/home', function () {
    return view('home.index');
})->name('home');

Route::get('/member', function () {
    return view('member.index');
})->name('member');

//Auth
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/signin', [AuthController::class, 'login'])->name('signin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/create', [ProjectController::class, 'create'])->name('projects.create')->middleware('auth');
Route::post('store', [ProjectController::class, 'store'])->name('projects.store')->middleware('auth');
Route::get('/edit/{project}', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/update/{project}', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/delete/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

Route::get('/register', function () {
    return view('register'); // Create a register.blade.php view
});

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/members', [MemberController::class, 'index'])->name('members.index');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/subs', [SubscriptionController::class, 'index'])->name('subs.index');
//     Route::get('/subscriptions/register', [SubscriptionController::class, 'create'])->name('subscriptions.create');
//     Route::post('/subscriptions/store', [SubscriptionController::class, 'store'])->name('subscriptions.store');
// });
Route::middleware(['auth'])->group(function () {
    Route::get('/details', [DetailController::class, 'index'])->name('details.index');
    Route::patch('/details/{id}/status', [DetailController::class, 'updateStatus'])->name('subscriptions.updateStatus');
    Route::patch('/details/{id}/update-status', [DetailController::class, 'updateStatus'])->name('details.updateStatus');
    Route::get('/details/{id}/edit', [DetailController::class, 'edit'])->name('details.edit');
    Route::put('/details/{id}/update', [DetailController::class, 'update'])->name('details.update');

});


Route::middleware(['auth'])->group(function () {
    // Subscription List (Subscription Details)
    Route::get('/subs', [SubscriptionController::class, 'index'])->name('subs.index');
    Route::post('/subscriptions', [SubscriptionController::class, 'store'])->name('subscriptions.store');
Route::patch('/subscriptions/{id}/status', [SubscriptionController::class, 'updateStatus'])->middleware('auth')->name('details.updateStatus');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/members', [MemberController::class, 'index'])->name('members.index');
});
