<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () { return view('welcome');});
Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::get('/isloggedin', [App\Http\Controllers\AuthController::class, 'isloggedin'])->name('haslogin');
Route::post('/articles', [App\Http\Controllers\ArtikelController::class, 'store']);
Route::get('/articles',[App\Http\Controllers\ArtikelController::class,'SearchArticle']);
Route::get('/Navigationsmenues', function () { return view('Navigationsmenues');});
Route::get('/newarticle', function () { return view('Artikeleingabe');});


Route::get('/debug/cookietest', function () {
    return view('cookietest');
});


/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::get('/article/{articleid}',[ArticleController::class,'getArticle']);
