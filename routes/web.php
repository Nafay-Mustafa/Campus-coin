<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/form', function () {
    return view('User.form');
});
Route::post('/adduser',[AdminController::class,('datatransfer')]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
