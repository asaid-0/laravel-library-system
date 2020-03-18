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

Route::get('/test', function () {
    return view('welcome');
});

Route::resource('userbooks', 'User\BookController');
Route::post('/userbooks/{book}', array('uses' => 'User\BookController@comment'));
Route::get('/category/{cat}', array('uses' => 'User\BookController@list'));
Route::post('/addAdmin', array('uses' => 'AdminController@addAdmin'))->name('addAdmin');

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/admins', 'AdminController@admin')->name('admins');
// Route::get('changeStatus', 'AdminController@ChangeUserStatus');
// Route::get('/users', 'AdminController@user')->name('users');
// Route::get('/books', 'AdminController@book')->name('books');
Route::get('/categories', 'AdminController@category')->name('categories');
Route::get('admins', 'AdminController@adminHome')->middleware('isAdmin')->name('admins');
Route::resource('users','AdminController') ;
Route::resource('UserLeasedBook','UserLeasedBookController') ;
// Route::get('users', 'AdminController@index');
Route::get('/active_deactive_users/{id}', 'AdminController@active_deactive_users');
Route::get('/search','User\BookController@search');
Route::get('/showAdmins','AdminController@adminsPage')->name('showAdmins') ;

Route::resource('books', 'BookController');
Route::resource('categories', 'CategoryController');



//
Route::get('/admin_books', 'AdminController@book')->name('books');
Route::get('/admin_categories', 'AdminController@category')->name('categories');
Route::get('addCategory','AdminController@addingCategory');

//

//Route::get('/test', function(){return view('test');});

Auth::routes();

