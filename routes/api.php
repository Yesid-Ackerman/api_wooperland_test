<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\ExchangeController;
use App\Http\Controllers\Api\StoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Api\ChildrenController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\UserController;

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

// Rutas para StoreController
Route::prefix('stores')->group(function () {
    Route::get('/list', [StoreController::class, 'index']);
    Route::post('/create', [StoreController::class, 'store']);
    Route::get('/show/{id}', [StoreController::class, 'show']);
    Route::put('/update/{store}', [StoreController::class, 'update']);
    Route::delete('/delete/{store}', [StoreController::class, 'destroy']);
});

// Rutas para ArticleController
Route::prefix('articles')->group(function () {
    Route::get('/list', [ArticleController::class, 'index']);
    Route::post('/create', [ArticleController::class, 'store']);
    Route::get('/show/{id}', [ArticleController::class, 'show']);
    Route::put('/update/{article}', [ArticleController::class, 'update']);
    Route::delete('/delete/{article}', [ArticleController::class, 'destroy']);
});

// Rutas para ExchangeController
Route::prefix('exchanges')->group(function () {
    Route::get('/list', [ExchangeController::class, 'index']);
    Route::post('/create', [ExchangeController::class, 'store']);
    Route::get('/show/{id}', [ExchangeController::class, 'show']);
    Route::put('/update/{exchange}', [ExchangeController::class, 'update']);
    Route::delete('/delete/{exchange}', [ExchangeController::class, 'destroy']);
});
