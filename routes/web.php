<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles',[App\Http\Controllers\ArticleController::class,'index']);
Route::resource('articles', App\Http\Controllers\ArticleController::class);
Route::get('/articles/{id}',[App\Http\Controllers\ArticleController::class,'getArticleById']);
Route::put('/article',[App\Http\Controllers\ArticleController::class,'updateArticle'])->name('article.update');


Route::get('clients', [App\Http\Controllers\ClientController::class, 'index'])->name('clients.index');
Route::post('add-client', [App\Http\Controllers\ClientController::class, 'addClient'])->name('client.add');
Route::get('/clients/{id}',[App\Http\Controllers\ClientController::class,'getClientById']);
Route::put('/client',[App\Http\Controllers\ClientController::class,'updateClient'])->name('client.update');
Route::delete('/clients/{id}', [App\Http\Controllers\ClientController::class, 'deleteClient']);


Route::resource('commandes',App\Http\Controllers\CommandeController::class);