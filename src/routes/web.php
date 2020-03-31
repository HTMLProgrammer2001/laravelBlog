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

//admin panel
Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'namespace' => 'Admin'], function (){
    Route::get('/', 'DashboardController@index');

    Route::resource('categories', 'CategoriesController');
    Route::resource('tags', 'TagController');
    Route::resource('users', 'UsersController');
    Route::resource('posts', 'PostsController');
    Route::resource('comments', 'CommentsController');
});

//main pages
Route::get('/', 'HomeController@index');
Route::get('/post/{slug}', 'HomeController@show')->name('post.show');
Route::get('/tag/{tag}', 'HomeController@tag')->name('tag.show');
Route::get('/category/{category}', 'HomeController@category')->name('category.show');
Route::get('uploads/{filename}', 'UploadController');

Route::post('/comments', 'CreateComment')->name('saveComment');

//login and register
Route::middleware('guest')->group(function (){
    Route::post('/login', 'AuthController@login')->name('login');
    Route::view('/login', 'pages.login');

    Route::post('/register', 'AuthController@register')->name('register');
    Route::view('/register', 'pages.register');
});

//authorization users
Route::middleware('auth')->group(function (){
    Route::post('/profile', 'ProfileController@store');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::get('/logout', 'AuthController@logout')->name('logout');
});
