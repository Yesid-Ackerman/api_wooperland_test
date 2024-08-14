<?php

use App\Http\Controllers\Api\FathterTopicController;
use App\Http\Controllers\Api\ChallengeController;
use App\Http\Controllers\Api\LevelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/prueba', function (){
 return "holaaa mundoo";
});

Route::prefix('levels')->group(function (){
Route::get('/index',[LevelController::class, 'index']);
Route::post('/store',[LevelController::class, 'store']);
Route::get('/show/{id}',[LevelController::class,'show']);
Route::put('/update/{level}',[LevelController::class,'update']);
Route::delete('/destroy/{level}',[LevelController::class,'destroy']);
});

Route::prefix('fathertopics')->group(function (){
Route::get('/index',[FathterTopicController::class, 'index']);
Route::post('/store',[FathterTopicController::class, 'store']);
Route::get('/show/{id}',[FathterTopicController::class,'show']);
Route::put('/update/{fathertopic}',[FathterTopicController::class,'update']);
Route::delete('/destroy/{fathertopic}',[FathterTopicController::class,'destroy']);
});

Route::prefix('challenges')->group(function (){
Route::get('/index',[ChallengeController::class, 'index']);
Route::post('/store',[ChallengeController::class, 'store']);
Route::get('/show/{id}',[ChallengeController::class,'show']);
Route::put('/update/{challenge}',[ChallengeController::class,'update']);
Route::delete('/destroy/{challenge}',[ChallengeController::class,'destroy']);
    });

