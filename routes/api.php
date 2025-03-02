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
// /api/courses gi vrakja courses so profesori
// /api/courses?professors=false vrakja courses bez professors
Route::get("/courses", [ApiController::class, "courses"]);
Route::get("/courses/{course}", [ApiController::class, "course"]);

// Get professors
Route::get("/professors", [ApiController::class, "professors"]);

// Get students
Route::get("/students", [ApiController::class, "students"]);

// get Module
Route::get("/modules/{module}", [ApiController::class, "module"]);
Route::get("/lessons/{lesson}", [ApiController::class, "lesson"]);

// interests
Route::get("/interests", [ApiController::class, "interests"]);

// profesor dashboard
Route::get("/professor/{professorId}/dashboard", [ApiController::class, "professorDashboard"]);
