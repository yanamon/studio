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
Auth::routes();
Route::resource('booking', 'BookingController');
Route::resource('gallery', 'GalleryController');
Route::resource('penyewa', 'PenyewaController');
Route::resource('savedStudio', 'SavedStudioController');
Route::resource('studio', 'StudioController');
Route::resource('studioMusik', 'StudioMusikController');
Route::resource('admin', 'AdminController');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/regisPenyewa', 'HomeController@regisPenyewa')->name('home.regisPenyewa')
Route::get('/regisStudio', 'HomeController@regisStudio')->name('home.regisStudio')

Route::get('verify', 'StudioMusikController@verify')->name('studioMusik.verify');
Route::post('resendVerifikasi', 'StudioMusikController@resendVerifikasi')->name('studioMusik.resendVerifikasi');

//Route::get('protected', ['middleware' => ['auth', 'admin'], function() {
//    return view("admin.home");
//}]);



Route::get('/adminlogin', 'Auth\AdminLoginController@loginform')->name('admin.loginform');
Route::post('/adminlogin', 'Auth\AdminLoginController@login')->name('admin.login');
Route::post('/adminlogout', 'Auth\AdminLoginController@logout')->name('admin.logout');


Route::get('/unconfirmedStudio', 'AdminController@unconfirmedStudio')->name('admin.unconfirmedStudio');
Route::post('/unconfirmStudio', 'AdminController@unconfirmStudio')->name('admin.unconfirmStudio');
Route::post('/confirmStudio', 'AdminController@confirmStudio')->name('admin.confirmStudio');
Route::get('/detailStudio/{id}', 'AdminController@detailStudio')->name('admin.detailStudio');