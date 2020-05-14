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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('categories', 'CategoriesController');
Route::resource('sub-categories', 'SubCategoriesController');
Route::resource('languages', 'LanguagesController');
Route::resource('projects', 'ProjectsController');
Route::get('trashed-project', 'ProjectsController@trashed')->name('trashed-projects.index');
Route::put('restore-projects/{project}', 'ProjectsController@restore')->name('restore-projects');
Route::resource('tags', 'TagsController');
