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

// User Authentication routes, including register and login 
Auth::routes();

Route::get('/', 'PagesController@index');                                       //landing

// User related routes      
Route::get('user/home', 'UserController@index')->name('user');                  // Landing page for user after login
Route::resource('user/profile', 'UserProfilesController');                      // Route for user profile including full CRUD resources
Route::resource('user/gallery', 'GalleriesController');                         // Route for user gallery including full CRUD resources
// Route::post('/logout', 'Auth\LoginController@userLogout')->name('user.logout');  // override for user logout

Route::group(['prefix' => 'admin'], function() {
    // Admin related routes
    Route::get('/home', 'AdminController@index')->name('admin.home');           // Route for admin dashboard. Including full CRUD resources
    Route::get('/profile', 'AdminController@profile');                          // Route for admin profile. Including full CRUD resources
    
    // Admin auth routes 
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    
    // Admin logout routes
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    
    // routes for password reset(admin)
    Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset','Auth\AdminResetPasswordController@reset')->name('admin.password.update');
    Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});
Route::resource('posts', 'PostsController');                                    // Route for posts
Route::get('/{slug}', 'HandleController@show');                                 //personal profile page