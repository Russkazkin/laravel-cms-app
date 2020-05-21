<?php

use App\Http\Controllers\Blog\PostsController;
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

\Route::get('/', 'WelcomeController@index')->name('welcome');
\Route::get('posts/{post}', [ PostsController::class, 'show' ]);

Auth::routes();

\Route::get('/home', 'HomeController@index')->name('home');

\Route::middleware('auth')->group(function (){

    \Route::resource('categories', 'CategoriesController');

    \Route::resource('tags', 'TagsController');

    \Route::resource('posts', 'PostsController');

    \Route::get('trashed-posts', 'PostsController@trashed')->name('posts.trashed');

    \Route::patch('posts/{post}/restore', 'PostsController@restore')->name('posts.restore');



});

\Route::middleware(['auth', 'admin'])->group(function (){
    \Route::get('users/profile', 'UsersController@edit')->name('users.edit-profile');
    \Route::patch('users/profile', 'UsersController@update')->name('users.update-profile');
    \Route::get('users', 'UsersController@index')->name('users.index');
    \Route::post('users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
});
