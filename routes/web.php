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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/Admin', 'Admin\DashBoradController',['except'=>['show','create','store','destroy','update','edit']])->middleware('can:access-admin');

Route::namespace('Admin')->prefix('Admin')->name('Admin.')->middleware('can:access-admin')->group(function(){
    Route::resource('/users','UsersContorller',['except'=>['show']]);
});