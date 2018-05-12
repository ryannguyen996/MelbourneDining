<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});

Route::get('countries', 'CountryAPIController@index');
Route::post('countries/store', 'CountryAPIController@store');
Route::put('countries/update', 'CountryAPIController@update');
Route::delete('countries/destroy', 'CountryAPIController@destroy');

Route::get('categories', 'CategoryAPIController@index');
Route::post('categories/store', 'CategoryAPIController@store');
Route::put('categories/update', 'CategoryAPIController@update');
Route::delete('categories/destroy', 'CategoryAPIController@destroy');

Route::get('users', 'UserAPIController@index');
Route::post('users/store', 'UserAPIController@store');
Route::put('users/update', 'UserAPIController@update');
Route::delete('users/destroy', 'UserAPIController@destroy');

Route::get('roles', 'RoleAPIController@index');
Route::post('roles/store', 'RoleAPIController@store');
Route::put('roles/update', 'RoleAPIController@update');
Route::delete('roles/destroy', 'RoleAPIController@destroy');

Route::get('restaurants', 'RestaurantAPIController@index');
Route::post('restaurants/store', 'RestaurantAPIController@store');
Route::put('restaurants/update', 'RestaurantAPIController@update');
Route::delete('restaurants/destroy', 'RestaurantAPIController@destroy');
Route::post('restaurants/createpost', 'RestaurantAPIController@createpost');
Route::put('restaurants/updatepost', 'RestaurantAPIController@updatepost');
Route::delete('restaurants/deletepost', 'RestaurantAPIController@deletepost');
Route::get('restaurants/getposts', 'RestaurantAPIController@getposts');
Route::get('restaurants/getrestaurants', 'RestaurantAPIController@getrestaurants');

Route::post('posts/createcomment', 'PostAPIController@createcomment');
Route::put('posts/updatecomment', 'PostAPIController@updatecomment');
Route::delete('posts/deletecomment', 'PostAPIController@deletecomment');
