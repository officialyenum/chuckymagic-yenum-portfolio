<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('auth/register', 'Api\AuthController@register')->name('api.register');
Route::post('auth/login', 'Api\AuthController@login')->name('api.login');
Route::get('users/verify/{token}', 'Api\UsersController@verify')->name('api.verify');
Route::get('users/{user}/resend', 'Api\UsersController@resend')->name('api.resend');
Route::resource('users', 'Api\UsersController', ['as' => 'api', 'only' => ['index', 'show', 'update']]);
Route::resource('posts', 'Api\PostsController', ['as' => 'api', 'only' => ['index', 'show', 'update']]);
Route::resource('categories', 'Api\CategoriesController', ['as' => 'api', 'only' => ['index', 'show','update']]);
Route::resource('tags', 'Api\TagsController', ['as' => 'api', 'only' => ['index', 'show', 'update']]);
