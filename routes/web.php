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

Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');

Route::get('/services', 'PagesController@services');

Route::get('/contact', 'PagesController@contact');

Route::resource('posts', 'PostsController');

// Route::get('/users{id}', function($id)
// {
//     return 'this is users'. $id;
// });
Route::get('/welcome', function()
{
    return view('welcome');
});
Route::get('/hello', function()
{
    return view('helloworld');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
