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

Auth::routes();




Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('/home', [
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);
    Route::get('/post/create', [
        'uses' => 'PostController@create',
        'as' => 'post.create'
    ]);
    Route::post('/post/store', [
        'uses' => 'PostController@store',
        'as' => 'post.store'
    ]);
    Route::get('/category/create', [
        'uses' => 'CategoriesController@create',
        'as'   => 'category.create'
    ]);
    Route::post('/category/store', [
        'uses' => 'CategoriesController@store',
        'as' => 'category.store'
    ]);
    Route::get('/categories', [
        'uses' => 'CategoriesController@index',
        'as' => 'categories'
    ]);
    Route::get('/category/edit/{id}', [
        'uses' => "CategoriesController@edit",
        'as' => "category.edit"
    ]);
    Route::get('/category/delete/{id}', [
        'uses' => "CategoriesController@destroy",
        'as' => "category.delete"
    ]);
    Route::post('/category/edit/{id}', [
        'uses' => "CategoriesController@update",
        'as' => "category.update"
    ]);
    Route::get('/posts/trashed', [
        'uses' => 'PostsController@trashed',
        'as' => 'posts.trashed'
    ]);
    Route::get('/posts/kill/{id}', [
        'uses' => 'PostsController@kill',
        'as' => 'posts.kill'
    ]);
    Route::get('/posts/restore/{id}', [
        'uses' => 'PostsController@restore',
        'as' => 'posts.restore'
    ]);
    Route::get('/posts/edit/{id}', [
        'uses' => 'PostsController@edit',
        'as' => 'posts.edit'
    ]);
    Route::post('/posts/update/{id}', [
        'uses' => 'PostsController@update',
        'as' => 'posts.update'
    ]);
    Route::get('/trash', [
        'uses' => 'PostsController@index',
        'as' => 'posts'
    ]);
    Route::get('/post/delete/{id}', [
        'uses' => "PostsController@destroy",
        'as' => "post.delete"
    ]);

    Route::get('/tags', [
       'uses' => 'TagsController@index',
       'as' => 'tags' 
    ]);
    Route::get('/tags/create', [
        'uses' => 'TagsController@create',
        'as' => 'tag.create' 
     ]);
     Route::post('/tags/store', [
        'uses' => 'TagsController@store',
        'as' => 'tag.store' 
     ]);
    Route::get('/tags/edit/{id}', [
        'uses' => 'TagsController@edit',
        'as' => 'tag.edit' 
     ]);
     Route::post('/tags/update/{id}', [
        'uses' => 'TagsController@update',
        'as' => 'tag.update' 
     ]);
     Route::get('/tags/delete/{id}', [
        'uses' => 'TagsController@destroy',
        'as' => 'tag.delete' 
     ]);
});