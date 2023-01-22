<?php

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

Route::match(['get', 'post'], '/botman', 'BotManController@handle');
Route::get('/bot', 'BotManController@tinker');


Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
        return redirect('/bot');
    })->name('login');
    Route::post('/login', 'AuthController@login');
    Route::get('/register', 'AuthController@register');
    Route::post('/register', 'AuthController@registerPost');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/out', 'HomeController@out');
    Route::get('/about', 'HomeController@about');
    Route::post('/change-password', 'AuthController@changePassword');
    Route::get('/conversation', 'ConversationController@index');
});
