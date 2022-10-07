<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [TestController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/testdb', 'HomeController@testDBConection');

Route::resource('students', \App\Http\Controllers\StudentController::class);
Route::resource('grades', \App\Http\Controllers\GradeController::class);

Route::post(
    'students/{student}/grade-student',
    [\App\Http\Controllers\StudentController::class, 'associateStudentGrade']
);

Route::put(
    '/students/{student}/grade-student/{grade-student}',
    [\App\Http\Controllers\StudentController::class, 'updateStudentGrade']
);
