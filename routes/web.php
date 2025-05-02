<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [StudentController::class, 'index'])->name('home'); // Updated to use StudentController@index

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::resource('students', StudentController::class);
});
