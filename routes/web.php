<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDeptController;
use App\Http\Controllers\AdminExam;
use App\Http\Controllers\AdminQuestionController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::get('/browes/exams', [HomeController::class, 'browes'])->name("browes");
Route::get('/take/{id}', [HomeController::class, 'take'])->name("take");
Route::get('/future', [HomeController::class, 'future'])->name("future");
Route::post('/schedule/exam', [HomeController::class, 'schedulestore'])->name("schedule.store");
Route::get('/schedule/{id}', [HomeController::class, 'schedule'])->name("schedule");
Route::get('/help', [HomeController::class, 'help'])->name("help");
Route::get('/result', [HomeController::class, 'result'])->name("result");
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name("dashboard");



// Route::middleware('admin')->group(function () {


    //Users

    // Route::get('/admin/user', [AdminUserController::class, 'index'])->name("admin.user.index");
    // Route::delete('/admin/users/{id}/delete', [AdminUserController::class, 'delete'])->name("admin.user.delete");
    // Route::post('/admin/users/{id}/update', [AdminUserController::class, 'update'])->name("admin.user.update");
    // Route::get('/admin/users/{id}/edit', [AdminUserController::class, 'edit'])->name("admin.user.edit");


    Route::get('/admin/levels/{id}', [AdminController::class, 'edit'])->name("admin.level.edit");
    // Route::get('/admin/levels/{id}', [AdminController::class, 'show'])->name("admin.level.show");
    Route::get('/admin/levels', [AdminController::class, 'index'])->name("admin.level.index");
    Route::post('/admin/levels/store',  [AdminController::class, 'store'])->name("admin.level.store");
    Route::delete('/admin/levels/{id}/delete', [AdminController::class, 'delete'])->name("admin.level.delete");
    // Route::get('/admin/lessons/{id}', [AdminCoursesController::class, 'show'])->name("admin.lesson.add");
    Route::get('/admin/depts/', [AdminDeptController::class, 'index'])->name("admin.dept.index");
    Route::post('/admin/depts/store', [AdminDeptController::class, 'store'])->name("admin.dept.store");
    Route::get('/admin/dept/{id}/edit', [AdminDeptController::class, 'edit'])->name("admin.dept.edit");
    Route::put('/admin/dept/{id}/update', [AdminDeptController::class, 'update'])->name("admin.dept.update");
    Route::delete('/admin/dept/{id}/delete', [AdminDeptController::class, 'delete'])->name("admin.dept.delete");

    Route::post('/admin/exam/store',  [AdminExam::class, 'store'])->name("admin.exam.store");
    Route::get('/admin/exam', [AdminExam::class, 'index'])->name("admin");
    Route::get('/admin/exam/{id}', [AdminExam::class, 'add'])->name("admin.exam.add");
    Route::get('/admin/exam/{id}/edit', [AdminExam::class, 'edit'])->name("admin.exam.edit");
    Route::put('/admin/exam/{id}/update', [AdminExam::class, 'update'])->name("admin.exam.update");
    Route::delete('/admin/exam/{id}/delete', [AdminExam::class, 'delete'])->name("admin.exam.delete");

    Route::get('/admin/exam/{id}/questions', [AdminQuestionController::class, 'index'])->name('questiosn');
    Route::get('/admin/question/{id}/edit', [AdminQuestionController::class, 'edit'])->name('n.question.edit');
    Route::post('/admin/exam/questions', [AdminQuestionController::class, 'store'])->name('admin.question.store');
    Route::post('/admin/questions/update/{id}', [AdminQuestionController::class, 'update'])->name('admin.question.update');


    // // Admin Game
    // Route::get('/admin/game', [AdminGameController::class, 'index'])->name("admin.game.index");
    // Route::post('/admin/game/store',  [AdminGameController::class, 'store'])->name("admin.game.store");
    // Route::get('/admin/game/{id}', [AdminGameController::class, 'add'])->name("admin.game.add");
    // Route::delete('/admin/game/{id}/delete', [AdminGameController::class, 'delete'])->name("admin.game.delete");
    // Route::delete('/admin/gamerow/{id}/delete', [AdminGameController::class, 'deletegame'])->name("admin.gamerow.delete");
    // Route::get('/admin/gamerow/{id}/edit', [AdminGameController::class, 'edit'])->name("admin.gamerow.edit");
    // Route::put('/admin/gamerow/{id}/update', [AdminGameController::class, 'update'])->name("admin.gamerow.update");


    // //home
    // Route::get('/admin/{id}', [AdminHomeController::class, 'show'])->name("admin.home.show");
    // Route::get('/admin', [AdminHomeController::class, 'index'])->name("admin.home.index");
    // Route::post('/admin/store', [AdminHomeController::class, 'store'])->name("admin.home.store");
    // Route::delete('/admin/{id}/delete', [AdminHomeController::class, 'delete'])->name("admin.home.delete");


// });


// Route::get('/progress', function () {
//     return view('progress');
// })->name("progress");

// Route::get('/login', function () {
//     return view('login');
// })->name("login");





Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');






Auth::routes();

