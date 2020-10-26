<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;


//lo aggiunto io per pvovare a stampare il file
use Illuminate\Support\Facades\File;

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

app()->bind('example', function() {
    return new \App\Models\Example();
});



Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

Route::get('/articles', 'App\Http\Controllers\ArticlesController@index')->name('articles.index');
Route::post('/articles', [ArticlesController::class, 'store']);
//Route::get('/articles/create', 'App\Http\Controllers\ArticlesController@create');
Route::get('/articles/create', [ArticlesController::class, 'create']);
ROute::get('/articles/{article}', 'App\Http\Controllers\ArticlesController@show')->name('articles.show');
ROute::get('/articles/{article}/edit', 'App\Http\Controllers\ArticlesController@edit');

Route::get('/testgetfile', function () {
    return File::get(public_path(('robots.txt')));
});