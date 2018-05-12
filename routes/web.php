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
Route::get('restaurants/createpostwithrestaurantid/{id}',
'RestaurantController@postwithcreate');
Route::post('restaurants/createpostwithrestaurantid',
'RestaurantController@createpostwithrestaurantid');

Route::get('categories/createrestaurantwithcategoryid/{id}',
'CategoryController@restaurantwithcreate');
Route::post('categories/createrestaurantwithcategoryid',
'CategoryController@createrestaurantwithcategoryid');

Route::get('countries/createrestaurantwithcountryid/{id}',
'CountryController@restaurantwithcreate');
Route::post('countries/createrestaurantwithcountryid',
'CountryController@createrestaurantwithcountryid');

Route::get('posts/createcommentwithpostid/{id}',
'PostController@commentwithcreate');
Route::post('posts/createcommentwithpostid',
'PostController@createcommentwithpostid');

Route::resource('categories', 'CategoryController');
Route::resource('comments', 'CommentController');
Route::resource('countries', 'CountryController');
Route::resource('posts', 'PostController');
Route::resource('restaurants', 'RestaurantController');
Route::resource('roles', 'RoleController');
Route::resource('users', 'UserController');
Route::get('restaurantwithdetails/{id}','RestaurantController@restaurantwithdetails');

