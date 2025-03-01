<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\ApiAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post("/login", [ApiAuthController::class, "login"]);
Route::post("/register", [ApiAuthController::class, "register"]);
Route::post("/logout", [ApiAuthController::class, "logout"]);

// get user
Route::get("/user/{user}", [ApiController::class, "user"]);

// Courses
// /api/courses gi vrakja bez profesori
// /api/courses?professors=true vrakja courses with professors
Route::get("/courses", [ApiController::class, "courses"]);

// Get professors
Route::get("/professors", [ApiController::class, "professors"]);

// Get students
Route::get("/students", [ApiController::class, "students"]);
