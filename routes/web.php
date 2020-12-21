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

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();
Route::get('/admin' ,[
	'as' => 'admin',
	'uses' => 'HomeController@admintrangchu'
]);

Route::get('/sanpham' ,[
	'as' => 'sanpham',
	'uses' => 'HomeController@sanphamtrangchu'
]);

Route::post('/addsanpham', [
	'as' =>	'addsanpham',
	'uses'=>'HomeController@addsanpham'
]);

Route::delete('/delete-sanpham/{id}', [
	'as' =>	'delete-sanpham',
	'uses'=>'HomeController@deletesanpham'
]);

Route::put('/update-sanpham/{id}', [
	'as' =>	'updatesanpham',
	'uses'=>'HomeController@updatesanpham'
]);




