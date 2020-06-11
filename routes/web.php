<?php

use App\Http\Controllers\Blog\PostsController;

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

Route::get('/', 'WelcomeController@index')->name('welcome');

Route::get('blog/posts/{post}', [PostsController::class, 'show'])->name('blog.show');
Route::get('blog/categories/{category}', [PostsController::class, 'category'])->name('blog.category');
Route::resource('blog/posts/{post}/replies', 'RepliesController');

Auth::routes(['verify' => true]);




Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('users/notifications', [UsersController::class, 'notifications']);

    Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['verified'])->group(function (){
    Route::resource('categories', 'CategoriesController');

    Route::resource('posts', 'PostsController');
});

    Route::get('trashed-posts', 'PostsController@trashed')->name('trashed-posts.index');

    Route::put('restore-post/{post}', 'PostsController@restore')->name('restore-posts');

    Route::get('users/notifications', 'UsersController@notifications')->name('users.notifications');

    Route::get('user/profile', 'UsersController@edit')->name('users.edit-profile');
    Route::put('user/profile', 'UsersController@update')->name('users.update-profile');
    Route::get('users', 'UsersController@index')->name('users.index');
    Route::post('users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
    Route::post('users/{user}/remove', 'UsersController@removeAdmin')->name('users.remove');
});
