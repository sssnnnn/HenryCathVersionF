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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/dashboard', [App\Http\Controllers\CommandeController::class, 'index'])->name('home');
Route::resource('commandes','App\Http\Controllers\CommandeController');
Route::get('/home', [App\Http\Controllers\CommandeController::class, 'index'])->name('home');
 
Route::resource('articles', App\Http\Controllers\ArticleController::class);
Route::post('article/update', 'App\Http\Controllers\ArticleController@update')->name('articles.update');
Route::get('article/{id}/edit', 'App\Http\Controllers\ArticleController@edit')->name('article.edit');

Route::resource('clients', App\Http\Controllers\ClientController::class);
Route::post('client/update', 'App\Http\Controllers\ClientController@update')->name('clients.update');
Route::get('client/{id}/edit', 'App\Http\Controllers\ClientController@edit')->name('client.edit');
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
