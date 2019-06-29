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
})->name('home.index');

// Yajra Routing
Route::get('/category/data','Admin\CategoryController@data')->name('category.data');
Route::get('/book/data','Admin\BookController@data')->name('book.data');
Route::get('/member/data','Admin\MemberController@data')->name('member.data');
Route::get('/loan-book/data','Admin\LoanController@data')->name('loan-book.data');

Route::resource('/category','Admin\CategoryController');
Route::resource('/book','Admin\BookController');
Route::resource('/loan-book','Admin\LoanController');
Route::resource('/member','Admin\MemberController');
