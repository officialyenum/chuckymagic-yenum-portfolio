<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

// Auth::routes();

Route::get('/welcome', 'HomeController@welcome')->name('welcome');

//Home Page
// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::get('dashboard/posts/{post}', [HomeController::class, 'show'])->name('dashboard.show');
Route::get('dashboard/categories/{category}', [HomeController::class, 'category'])->name('dashboard.category');
Route::get('dashboard/tags/{tag}', [HomeController::class, 'tag'])->name('dashboard.tag');

// Route::post('admin/login', [LoginController::class, 'adminLogin'])->name('admin.login');

//Admin Panel
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('overview', 'Admin\AdminController@index')->name('admin.index');
    Route::resource('categories', 'Admin\CategoriesController');
    Route::resource('posts', 'Admin\PostsController');
    Route::resource('tags', 'Admin\TagsController');
    // Route::get('trashed-post', 'Admin\PostsController@trashed')->name('trashed-posts.index');
    // Route::put('restore-posts/{post}', 'Admin\PostsController@restore')->name('restore-posts');
    //content Image
    // Route::post('post/upload', 'ImageController@uploadFile');

    // Users Management
    Route::get('users/administrators', 'Admin\UsersController@administrator')->name('users.administrators');
    Route::get('users/writers', 'Admin\UsersController@writer')->name('users.writers');
    Route::get('users/guests', 'Admin\UsersController@guest')->name('users.guests');
    Route::get('users/roles', 'Admin\UsersController@roles')->name('users.roles');
    Route::get('trashed-users', 'Admin\UsersController@trashed')->name('trashed-users.index');
    Route::put('restore-users/{user}', 'Admin\UsersController@restore')->name('restore-users');
    Route::post('users/{user}/make-writer', 'Admin\UsersController@makeWriter')->name('users.make-writer');
    Route::post('users/{user}/remove-writer', 'Admin\UsersController@removeWriter')->name('users.remove-writer');
    Route::post('users/{user}/make-admin', 'Admin\UsersController@makeAdmin')->name('users.make-admin');
    Route::post('users/{user}/remove-admin', 'Admin\UsersController@removeAdmin')->name('users.remove-admin');
    Route::post('users/{user}/make-super-admin', 'Admin\UsersController@makeSuperAdmin')->name('users.make-super-admin');
    Route::post('users/{user}/remove-super-admin', 'Admin\UsersController@removeSuperAdmin')->name('users.remove-super-admin');
    Route::resource('users', 'Admin\UsersController');

    // Post Management
    Route::resource('posts', 'Admin\PostsController');
    Route::get('trashed-posts', 'Admin\PostsController@trashed')->name('trashed-posts.index');
    Route::put('restore-posts/{post}', 'Admin\PostsController@restore')->name('restore-posts');
    Route::put('posts/{post}/categories', 'Admin\PostsController@categories')->name('post.categories');
    Route::put('posts/{post}/tags', 'Admin\PostsController@tags')->name('post.tags');
    //Category Management
    Route::resource('categories', 'Admin\CategoriesController');
    //Tag Management
    Route::resource('tags', 'Admin\TagsController');
    //Contact Management
    Route::resource('contact', 'Admin\ContactController');
    //Anonymous Management
    Route::resource('anonymous-yellow', 'Admin\AnonymousMessageController');
    Route::get('anonymous-yellow/published', 'Admin\AnonymousMessageController@published')->name('anonymous-yellow.published');
    Route::get('anonymous-yellow/unpublished', 'Admin\AnonymousMessageController@unpublished')->name('anonymous-yellow.unpublished');
    Route::post('anonymous-yellow/{id}/publish', 'Admin\AnonymousMessageController@publish')->name('anonymous-yellow.publish');
    Route::post('anonymous-yellow/unpublished/delete', 'Admin\AnonymousMessageController@deleteUnpublished')->name('anonymous-yellow.deleteUnpublished');

    //Media Management
    Route::resource('media', 'Admin\MediaController');
});

//Games
// Route::get('games', 'GamesController@index')->name('games.index');
// Route::get('csgame', 'GamesController@csgame')->name('games.csgame');

//Cards
// Route::get('card', 'CardsController@index')->name('card.index');
// Route::get('card-high-low', 'CardsController@highLow')->name('card.high-low');
// Route::get('card-card-wars', 'CardsController@cardWars')->name('card.card-wars');

//Dice
// Route::get('dice', 'DiceController@index')->name('dice.index');
// Route::get('dice-single', 'DiceController@single')->name('dice.single');
// Route::get('dice-multiplayer', 'DiceController@multiplayer')->name('dice.multiplayer');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
