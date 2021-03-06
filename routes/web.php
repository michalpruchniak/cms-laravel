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

Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);

Route::get('/post/{slug}', [
    'uses' => 'FrontEndController@singlePost',
    'as' => 'post.single'
]);
Route::get('/category/{id}', [
    'uses' => 'FrontEndController@category',
    'as' => 'category.single'
]);
Route::get('/tag/{id}', [
    'uses' => 'FrontEndController@tag',
    'as' => 'tag.single'
]);
Route::get('/results', function(){
    $post = \App\Post::where('title', 'like', '%' . request('query') . '%')->get();

    return view('results')
                ->with('posts', $post)
                ->with('title', 'Search results : ' . request('query'))
                ->with('settings', \App\Setting::first())
                ->with('categories', \App\Category::take(5)->get())
                ->with('query', request('query'));
});
Auth::routes();




Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('/home', [
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);
    Route::get('/post/create', [
        'uses' => 'PostsController@create',
        'as' => 'post.create'
    ]);
    Route::post('/post/store', [
        'uses' => 'PostsController@store',
        'as' => 'post.store'
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

     Route::get('/users', [
        'uses' => 'UsersController@index',
        'as' => 'users'
     ]);
     Route::get('/users/create', [
        'uses' => 'UsersController@create',
        'as' => 'user.create'
     ]);
     Route::post('/users/store',[
        'uses' => 'UsersController@store',
        'as' => 'user.store'
     ]);
     Route::get('/user/admin/{id}', [
        'uses' => 'UsersController@admin',
        'as' => 'user.admin'
     ]);
     Route::get('/user/not-admin/{id}', [
        'uses' => 'UsersController@not_admin',
        'as' => 'user.not.admin'
     ]);

     Route::get('/user/profile', [
        'uses' => 'ProfilesController@index',
        'as' => 'user.profile'
     ]);
     Route::post('/user/profile/update', [
        'uses' => 'ProfilesController@update',
        'as' => 'user.profile.update'
     ]);
     Route::get('/user/delete/{id}', [
        'uses' => 'UsersController@destroy',
        'as' => 'user.delete'
     ]);

     Route::get('/settings', [
        'uses' => 'SettingsController@index',
        'as' => 'settings'
     ]);
     Route::post('/settings/update', [
        'uses' => 'SettingsController@update',
        'as' => 'settings.update'
     ]);
});