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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('categories', 'CategoriesController');
Route::resource('subcategories', 'SubCategoriesController');
Route::resource('languages', 'LanguagesController');
Route::resource('projects', 'ProjectsController');
Route::get('trashed-project', 'ProjectsController@trashed')->name('trashed-projects.index');
Route::put('restore-projects/{project}', 'ProjectsController@restore')->name('restore-projects');
Route::resource('tags', 'TagsController');

//Games
Route::get('games', 'GamesController@index')->name('games.index');

//Cards
Route::get('card', 'CardsController@index')->name('card.index');
Route::get('card-high-low', 'CardsController@highLow')->name('card.high-low');
Route::get('card-card-wars', 'CardsController@cardWars')->name('card.card-wars');

//Dice
Route::get('dice', 'DiceController@index')->name('dice.index');
Route::get('dice-single', 'DiceController@single')->name('dice.single');
Route::get('dice-multiplayer', 'DiceController@multiplayer')->name('dice.multiplayer');
