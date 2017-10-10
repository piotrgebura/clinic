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

Route::get('/auth/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/auth/login', 'Auth\LoginController@login');
Route::get('/auth/logout', 'Auth\LoginController@userLogout')->name('logout');

Route::get('/auth/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/auth/register', 'Auth\RegisterController@register');

Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');

Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

	Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
});

Route::get('/about', 'PagesController@getAbout')->name('about');
Route::get('/contact', 'PagesController@getContact')->name('contact');
Route::post('/contact', 'PagesController@postContact');
Route::get('/', 'PagesController@getIndex')->name('home');

Route::resource('doctors', 'DoctorController');
Route::resource('specializations', 'SpecializationController', ['except' => ['create']]);
Route::resource('facilities', 'FacilityController');

Route::prefix('services')->group(function(){
	Route::get('/specializations', 'ServiceController@specializationsIndex')->name('services.specializations');
	Route::get('/specializations/{specialization}', 'ServiceController@specializationsShow')->name('services.specializations.show');
	Route::get('/doctors/{doctor}', 'ServiceController@doctorsShow')->name('services.doctors.show');
});