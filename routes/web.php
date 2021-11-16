<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\BugReportController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Models\Answer;
use Illuminate\Support\Facades\Route;

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

// Halaman Home
Route::get('/', [QuestionController::class, 'index']);

// User Route
Route::get('/profil', [UserController::class, 'user_profile']);

// Question Route
Route::get('/tambah', [QuestionController::class, 'add_view']);
Route::get('/detail/{question_id}', [QuestionController::class, 'detail']);
Route::get('/profil', [QuestionController::class, 'view_by_user_id']);
Route::get('image/view/{fileImage}', [QuestionController::class, 'view_image'])->name('image_view');
Route::post('tambah/save', [QuestionController::class, 'store'])->name('save_question');
Route::get('/my-question', [QuestionController::class, 'my_question']);
Route::get('/question/edit_question/{id}', [QuestionController::class, 'edit_question']);
Route::post('/question/update', [QuestionController::class, 'update']);
Route::get('/question/delete/{id}', [QuestionController::class, 'delete']);


// Answer Route
Route::post('answer/add/{question_id}', [AnswerController::class, 'add'])->name('save_answer');
Route::get('my-answer', [AnswerController::class, 'my_answer']);
Route::get('answer/edit/{id}', [AnswerController::class, 'get_answer_for_update']);
Route::post('answer/update/{id}', [AnswerController::class, 'update']);
Route::get('/answer/delete/{id}', [AnswerController::class, 'delete']);

// Email Route
Route::get('report', function () {
    return view('bug/report');
});
Route::post('report/kirim', [BugReportController::class, 'send']);

// About Route
Route::get(
    '/about',
    [AboutController::class, 'about']
);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
