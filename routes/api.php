<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1/')->group(function(){
    Route::get('posts',[PostController::class,'index']);
    Route::post('posts',[PostController::class,'store']);
    Route::get('posts/{post}',[PostController::class,'show']);
    Route::put('posts/{post}',[PostController::class,'update']);
    Route::delete('posts/{post}',[PostController::class,'destroy']);
});

Route::get('/test',function(){
    p('Working');
});

Route::post('user/store',[UserController::class,'store']);
Route::get('user/get/{flag}',[UserController::class,'index']);
Route::get('user/{id}',[UserController::class,'show']);