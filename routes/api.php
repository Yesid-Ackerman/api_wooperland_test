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
Route::put('/update/{levels}',[LevelController::class,'update']);
Route::delete('/destroy/{levels}',[LevelController::class,'destroy']);
});

Route::prefix('fathertopics')->group(function (){
Route::get('/index',[FathterTopicController::class, 'index']);
Route::post('/store',[FathterTopicController::class, 'store']);
Route::get('/show/{id}',[FathterTopicController::class,'show']);
Route::put('/update/{fathertopics}',[FathterTopicController::class,'update']);
Route::delete('/destroy/{fathertopics}',[FathterTopicController::class,'destroy']);
});

Route::prefix('challenges')->group(function (){
Route::get('/index',[ChallengeController::class, 'index']);
Route::post('/store',[ChallengeController::class, 'store']);
Route::get('/show/{id}',[ChallengeController::class,'show']);
Route::put('/update/{challenges}',[ChallengeController::class,'update']);
Route::delete('/destroy/{challenges}',[ChallengeController::class,'destroy']);
    });

