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
use App\User;

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//is user has been block, redirect to route
Route::get('/view-block/user', function () {
    //something
})->name('view.block.user');

//test middleware check user is admin
Route::get('/', function () {
    return view('welcome');
})->middleware('check.admin');

Route::get('test', function () {
    return view('admin.layout.index');
});
Route::get('test1', function () {
    return view('admin.user.list');
});
Route::get('test2', function () {
    return view('admin.user.edit');
});
Route::get('test3', function () {
    return view('admin.user.add');
});


