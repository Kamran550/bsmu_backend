<?php

use Illuminate\Support\Facades\Route;


Route::domain('admin.bsmu.edu.rs')->group(function () {
    require base_path('routes/admin.php');
});


Route::domain('teacher.bsmu.edu.rs')->group(function () {
    require base_path('routes/teacher.php');
});


Route::domain('student.bsmu.edu.rs')->group(function () {
    require base_path('routes/student.php');
});


Route::domain('verify.bsmu.edu.rs')->group(function () {
    require base_path(path: 'routes/verify.php');
});