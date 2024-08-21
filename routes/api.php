<?php

use App\Http\Controllers\Api\AchievementController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\ChildrenImageController;
use App\Http\Controllers\Api\ExchangeController;
use App\Http\Controllers\Api\StoreController;
use App\Http\Controllers\Api\TopicController;
use App\Http\Controllers\Api\ChildrenController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//CRUD_TEMAS (HAIVER)
Route::prefix('topic')->group(function () {
    Route::get('/index',[TopicController::class, 'index']);
    Route::post('/store',[TopicController::class, 'store']);
    Route::get('/show/{id}',[TopicController::class,'show']);
    Route::put('/update/{topic}',[TopicController::class,'update']);
    Route::delete('/destroy/{topic}',[TopicController::class,'destroy']);
});

//CRUD_LOGROS (HAIVER)
    Route::prefix('achievement')->group(function () {
    Route::get('/index',[AchievementController::class, 'index']);
    Route::post('/store',[AchievementController::class, 'store']);
    Route::get('/show/{id}',[AchievementController::class,'show']);
    Route::put('/update/{achievement}',[AchievementController::class,'update']);
    Route::delete('/destroy/{achievement}',[AchievementController::class,'destroy']);
});

//CRUD_IMAGENES-NIÑOS (HAIVER)
    Route::prefix('childrenimage')->group(function () {
    Route::get('/index',[ChildrenImageController::class, 'index']);
    Route::post('/store',[ChildrenImageController::class, 'store']);
    Route::get('/show/{id}',[ChildrenImageController::class,'show']);
    Route::put('/update/{childrenimage}',[ChildrenImageController::class,'update']);
    Route::delete('/destroy/{childrenimage}',[ChildrenImageController::class,'destroy']);
});

//crud user(father)
Route::get('listUser', [UserController::class,'index'])->name('api.users.index');
Route::post('createUser', [UserController::class,'store'])->name('api.users.store');
Route::get('showUser/{user}', [UserController::class,'show'])->name('api.users.show');
Route::put('updateUser/{user}', [UserController::class,'update'])->name('api.users.update');
Route::delete('deleteUser/{user}', [UserController::class,'destroy'])->name('api.users.delete');

//crud children
Route::get('listChildren', [ChildrenController::class,'index'])->name('api.childrens.index');
Route::post('createChildren', [ChildrenController::class,'store'])->name('api.childrens.store');
Route::get('showChildren/{children}', [ChildrenController::class,'show'])->name('api.childrens.show');
Route::put('updateChildren/{category}', [ChildrenController::class,'update'])->name('api.childrens.update');
Route::delete('deleteChildren/{category}', [ChildrenController::class,'destroy'])->name('api.childrens.delete');

//crud report
Route::get('listReport', [ReportController::class,'index'])->name('api.reports.index');
Route::post('createReport', [ReportController::class,'store'])->name('api.reports.store');
Route::get('show/Report{report}', [ReportController::class,'show'])->name('api.reports.show');
Route::put('updateReport/{report}', [ReportController::class,'update'])->name('api.reports.update');
Route::delete('/report/delete/{report}', [ReportController::class,'destroy'])->name('api.reports.delete');
