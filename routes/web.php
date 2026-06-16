<?php

use Illuminate\Support\Facades\Route;


Route::domain('admin.bsmu.org')->group(function () {
    require base_path('routes/admin.php');
});


Route::domain('teacher.bsmu.org')->group(function () {
    require base_path('routes/teacher.php');
});


Route::domain('student.bsmu.org')->group(function () {
    require base_path('routes/student.php');
});


Route::domain('verify.bsmu.org')->group(function () {
    require base_path(path: 'routes/verify.php');
});