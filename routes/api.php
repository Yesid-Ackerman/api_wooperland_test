<?php
use App\Http\Controllers\Api\TopicController;
use App\Http\Controllers\Api\AchievementController;
use App\Http\Controllers\Api\ChildrenImageController;
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

Route::get('/', function () {
    return view('welcome');
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
