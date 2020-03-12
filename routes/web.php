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

Route::get('/book', function () {
    return view('book');
});
Route::get('/test', function () {
    return view('welcome');
});

Route::resource('userbooks', 'BookController');

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/admins', 'AdminController@admin')->name('admins');
Route::get('/users', 'AdminController@user')->name('users');
Route::get('/books', 'AdminController@book')->name('books');
Route::get('/categories', 'AdminController@category')->name('categories');
Route::get('admins', 'AdminController@adminHome')->middleware('isAdmin')->name('admins');




Auth::routes();

