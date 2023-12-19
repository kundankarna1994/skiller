<?php

use App\Http\Controllers\Api\QuestionCategoryController;
use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\Api\QuestionsByCategoryController;
use App\Http\Controllers\Api\QuizCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

require __DIR__ . '/auth.php';

Route::middleware(['auth:sanctum','verified'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'admin','middleware' => 'auth:sanctum'],function(){
    Route::apiResource('question-categories', QuestionCategoryController::class);
    Route::get("/question-categories/{questionCategory}/questions", QuestionsByCategoryController::class);
    Route::apiResource('questions', QuestionController::class);
    Route::apiResource('quiz-categories', QuizCategoryController::class);
});
