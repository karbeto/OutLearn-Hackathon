<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InterestController;

Route::get('/dashboard', function () {
    return redirect()->route("home");
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('courses', CourseController::class);
Route::resource('interests', InterestController::class);

Route::get('/', [HomeController::class, "index"])->name("home");
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get("/modules/create/{course}", [ModuleController::class, "create"])->name("modules.create");
Route::post("/modules/create/{course}", [ModuleController::class, "store"]);

Route::get("/modules/index/{course}", [ModuleController::class, "index"])->name("modules.index");
Route::get("/modules/edit/{module}", [ModuleController::class, "edit"])->name("modules.edit");
Route::put("/modules/update/{module}", [ModuleController::class, "update"])->name("modules.update");
Route::delete("/modules/delete/{module}", [ModuleController::class, "destroy"])->name("modules.destroy");

Route::get('lessons/{module_id}', [LessonController::class, 'index'])->name('lessons.index');
Route::get('lessons/{module_id}/create', [LessonController::class, 'create'])->name('lessons.create');
Route::post('lessons/{module_id}', [LessonController::class, 'store'])->name('lessons.store');
Route::get('lessons/{module}/edit/{lesson}', [LessonController::class, 'edit'])->name('lessons.edit');
Route::put('lessons/{module}/update/{lesson}', [LessonController::class, 'update'])->name('lessons.update');
Route::delete('lessons/{module}/{lesson}', [LessonController::class, 'destroy'])->name('lessons.destroy');

require __DIR__ . '/auth.php';
