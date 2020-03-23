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

use \Illuminate\Support\Facades\File;

Route::get('/', 'HomeController@index');
Route::get('/post/{slug}', 'HomeController@show')->name('post.show');
Route::get('/tag/{tag}', 'HomeController@tag')->name('tag.show');
Route::get('/category/{category}', 'HomeController@category')->name('category.show');

Route::get('/admin', 'AdminDashboardController@index');

Route::get('uploads/{filename}', function($filename)
{
    $filePath = storage_path().'/app/uploads/'.$filename;

    if ( ! File::exists($filePath))
    {
        return Response::make($filePath . " File does not exist.", 404);
    }

    return Storage::response('uploads/' . $filename);
});

Route::resource('/admin/categories', 'AdminCategoriesController');
Route::resource('/admin/tags', 'AdminTagController');
Route::resource('/admin/users', 'AdminUsersController');
Route::resource('/admin/posts', 'AdminPostsController');
