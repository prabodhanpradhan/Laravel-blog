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

Auth::routes();

Route::get('/', 'BlogsController@index');

Route::get('/{slug}/{post_id}','BlogsController@postdetail');

Route::get('category/{category_name}/{category_id}','BlogsController@category_filter');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create-post', 'HomeController@create_post');

Route::post('/create-post', 'HomeController@store_post');

Route::get('/post/delete/{post_id}', 'HomeController@delete_post');

Route::get('/post/edit/{post_id}', 'HomeController@edit_post');

Route::post('/post/edit/{post_id}', 'HomeController@update_post');

Route::get('/post/show/{post_id}', 'HomeController@show_post');
