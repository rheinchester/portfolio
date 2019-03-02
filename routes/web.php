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

// Authentication routes including register and login routes
Auth::routes();

// Pages Controller including user index page and contact page
Route::get('/', 'PagesController@index');                               //landing page
Route::get('/{slug}', 'HandleController@show');                 //personal profile page


Route::resource('pages','PagesController');                             // Pages resources

Route::resource('user/profile', 'UserProfilesController');              // Route for user profile including full CRUD resources


Route::resource('user/gallery', 'GalleriesController');                 // Route for user gallery including full CRUD resources
// Route::get('user/gallery/{slug}', 'GalleriesController@handle');

Route::get('user/home', 'userController@index')->name('user');          // Landing page for user after login

Route::resource('posts', 'PostsController');                            // Route for posts
