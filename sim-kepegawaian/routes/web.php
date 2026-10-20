<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return redirect()->route('employees.index');
});

Route::middleware('auth')->group(function () {
    Route::resource('departments', DepartmentController::class)
        ->except('show');

    Route::resource('employees', EmployeeController::class)
        ->except('show');
});

require __DIR__.'/auth.php';