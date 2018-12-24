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
// landing page controller
Route::get('/home', 'HomeController@index')->name('home');

// Pages Controller including user index page and contact page
Route::get('/', 'PagesController@index');               //landing page
// Route::get('/contact', 'PagesController@contact');      //user contact page


// Pages Controller including user index page and contact page
Route::resource('pages','PagesController');

// route for posts
Route::resource('posts', 'PostsController');

// route for userprofile including full CRUD resources
Route::resource('user/profile', 'UserProfilesController');
// Route::resource('user/index', 'UserController@index');



// route for userprofile including full CRUD resources
Route::resource('user/gallery', 'GalleriesController');
Route::get('/{id}', 'PagesController@profile');           //personal page page




Route::get('admin/home', function()
{
    return view('admin.home');
})->name('post');

Route::get('user/home', 'userController@index')->name('user');





















// Route::get('/userProfile', 'userProfile@index')->name('home');

// Route::get('/users{id}', function($id)
// {
//     return 'this is users'. $id;
// });
// Route::get('/welcome', function()
// {
//     return view('welcome');
// });
// Route::get('/hello', function()
// {
//     return view('helloworld');
// });
