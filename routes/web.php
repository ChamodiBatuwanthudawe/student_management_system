<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;
Route::get('/', function () {
    return redirect()->route('subjects.index');
});

Route::resource('subjects', SubjectController::class);
Route::resource('students', StudentController::class);