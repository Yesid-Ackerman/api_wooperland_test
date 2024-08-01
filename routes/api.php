<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\ChildrenController;
use App\Http\Controllers\FatherController;
use App\Http\Controllers\UserController;

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

Route::get('/list', [UserController::class,'index'])->name('api.users.index');
Route::post('/user/create', [UserController::class,'store'])->name('api.users.store');
Route::get('show/{user}', [UserController::class,'show'])->name('api.users.show');
Route::put('update/{user}', [UserController::class,'update'])->name('api.users.update');
Route::delete('delete/{user}', [UserController::class,'destroy'])->name('api.users.delete');

Route::get('/list', [ChildrenController::class,'index'])->name('api.childrens.index');
Route::post('/create', [ChildrenController::class,'store'])->name('api.childrens.store');
Route::get('show/{category}', [ChildrenController::class,'show'])->name('api.childrens.show');
Route::put('update/{category}', [ChildrenController::class,'update'])->name('api.childrens.update');
Route::delete('delete/{category}', [ChildrenController::class,'destroy'])->name('api.childrens.delete');
