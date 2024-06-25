<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;


Route::get('/',function(){
    return 'Api sikdim na tw';
});

Route::get('/articles',[ArticleController::class,'index'])->name('article');