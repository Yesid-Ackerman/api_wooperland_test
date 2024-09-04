<?php

use App\Http\Controllers\Api\AchievementController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\ChallengeController;
use App\Http\Controllers\Api\ChildrenImageController;
use App\Http\Controllers\Api\ExchangeController;
use App\Http\Controllers\Api\StoreController;
use App\Http\Controllers\Api\TopicController;
use App\Http\Controllers\Api\ChildrenController;
use App\Http\Controllers\Api\FathterTopicController;
use App\Http\Controllers\Api\LevelController;
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

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//crud user(father)                                                                                                    
Route::prefix('users')->group(function () {                                                        
    Route::get('list', [UserController::class, 'index'])->name('index');                                               
    Route::post('create', [UserController::class, 'store'])->name('store');                                            
    Route::get('show/{user}', [UserController::class, 'show'])->name('show');                                          
    Route::put('update/{user}', [UserController::class, 'update'])->name('update');                                    
    Route::delete('delete/{user}', [UserController::class, 'destroy'])->name('delete');                                
});                                                                                                                    
                                                                                                                       
//crud children                                                                                                        
Route::prefix('childrens')->group(function () {                                                
    Route::get('list', [ChildrenController::class, 'index'])->name('index');                                           
    Route::post('create', [ChildrenController::class, 'store'])->name('store');                                        
    Route::get('show/{children}', [ChildrenController::class, 'show'])->name('show');                                  
    Route::put('update/{children}', [ChildrenController::class, 'update'])->name('update');                            
    Route::delete('delete/{children}', [ChildrenController::class, 'destroy'])->name('delete');                        
});                                                                                                                    
                                                                                                                       
//crud report                                                                                                          
Route::prefix('reports')->group(function () {                                                   
    Route::get('list', [ReportController::class, 'index'])->name('index');                                             
    Route::post('create', [ReportController::class, 'store'])->name('store');                                          
    Route::get('show/{report}', [ReportController::class, 'show'])->name('show');                                      
    Route::put('update/{report}', [ReportController::class, 'update'])->name('update');                                
    Route::delete('delete/{report}', [ReportController::class, 'destroy'])->name('delete');                            
});                                                                                                                    
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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

// // Rutas para StoreController
// Route::prefix('stores')->group(function () {
//     Route::get('/list', [StoreController::class, 'index']);
//     Route::post('/create', [StoreController::class, 'store']);
//     Route::get('/show/{id}', [StoreController::class, 'show']);
//     Route::put('/update/{store}', [StoreController::class, 'update']);
//     Route::delete('/delete/{store}', [StoreController::class, 'destroy']);
// });

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