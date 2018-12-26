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
})->name('view.block.user')->middleware('check.block.user');

//test middleware check user is admin
Route::get('/', function () {
    return view('welcome');

})->middleware('check.admin');

Route::group(['prefix'=>'admin'], function() 
{
	Route::group(['prefix'=>'role'], function() 
	{
		Route::get('list', 'RoleController@getList');

		Route::get('update/{id}', 'RoleController@getUpdate');

		Route::post('update/{id}', 'RoleController@postUpdate');

		Route::get('create', 'RoleController@getCreate');

		Route::post('create', 'RoleController@postCreate');

		Route::get('delete/{id}', 'RoleController@getDelete');

	});

	Route::group(['prefix'=>'paymethod'], function() 
	{
		Route::get('list', 'PaymethodController@getList');

		Route::get('update/{id}', 'PaymethodController@getUpdate');

		Route::post('update/{id}', 'PaymethodController@postUpdate');

		Route::get('create', 'PaymethodController@getCreate');

		Route::post('create', 'PaymethodController@postCreate');

		Route::get('delete/{id}', 'PaymethodController@getDelete');

	});
	
});


