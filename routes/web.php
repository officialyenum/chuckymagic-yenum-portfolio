<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
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

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('dashboard/posts/{post}', [HomeController::class, 'show'])->name('dashboard.show');
Route::get('dashboard/categories/{category}', [HomeController::class, 'category'])->name('dashboard.category');
Route::get('dashboard/tags/{tag}', [HomeController::class, 'tag'])->name('dashboard.tag');

// Route::post('admin/login', [LoginController::class, 'adminLogin'])->name('admin.login');

//Admin Panel
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('dashboard', 'Admin\AdminController@index')->name('admin.index');
    Route::resource('categories', 'Admin\CategoriesController');
    Route::resource('posts', 'Admin\PostsController');
    Route::resource('tags', 'Admin\TagsController');
    Route::get('trashed-post', 'Admin\PostsController@trashed')->name('trashed-posts.index');
    Route::put('restore-posts/{post}', 'Admin\PostsController@restore')->name('restore-posts');
    //content Image
    // Route::post('post/upload', 'ImageController@uploadFile');

    // Users
    Route::resource('users', 'Admin\UsersController');
    Route::post('users/{user}/make-writer', 'Admin\UsersController@makeWriter')->name('users.make-writer');
    Route::post('users/{user}/remove-writer', 'Admin\UsersController@removeWriter')->name('users.remove-writer');
    Route::post('users/{user}/make-admin', 'Admin\UsersController@makeAdmin')->name('users.make-admin');
    Route::post('users/{user}/remove-admin', 'Admin\UsersController@removeAdmin')->name('users.remove-admin');
    Route::post('users/{user}/make-super-admin', 'Admin\UsersController@makeSuperAdmin')->name('users.make-super-admin');
    Route::post('users/{user}/remove-super-admin', 'Admin\UsersController@removeSuperAdmin')->name('users.remove-super-admin');
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

Route::get('/home', 'HomeController@index')->name('home');
