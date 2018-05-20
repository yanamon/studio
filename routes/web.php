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
Route::get('/listStudio', 'HomeController@listStudio')->name('home.listStudio');
Route::post('/nearStudio', 'HomeController@nearStudio')->name('home.nearStudio');
Route::get('/regisStudio', ['middleware' => 'auth', 'uses'=> 'HomeController@regisStudio'])->name('home.regisStudio');
Route::get('/detailStudio/{id}', 'HomeController@detailStudio')->name('index.detailStudio');

Route::get('/bookStudio/{id}', 'BookingController@bookStudio')->name('home.bookStudio');
Route::post('/rekapBooking', 'BookingController@rekapBooking')->name('booking.rekapBooking');

Route::get('verify', 'StudioMusikController@verify')->name('studioMusik.verify');
Route::post('resendVerifikasi', 'StudioMusikController@resendVerifikasi')->name('studioMusik.resendVerifikasi');

//Route::get('protected', ['middleware' => ['auth', 'admin'], function() {
//    return view("admin.home");
//}]);

Route::get('/userBooking/{id}', 'PenyewaController@userBooking')->name('penyewa.userBooking');
Route::get('/userProfile/{id}', 'PenyewaController@userProfile')->name('penyewa.userProfile');








Route::get('/adminlogin', 'Auth\AdminLoginController@loginform')->name('admin.loginform');
Route::post('/adminlogin', 'Auth\AdminLoginController@login')->name('admin.login');
Route::post('/adminlogout', 'Auth\AdminLoginController@logout')->name('admin.logout');

Route::get('/crudStudioMusik', 'AdminController@crudStudioMusik')->name('admin.crudStudioMusik');
Route::get('/crudUser', 'AdminController@crudUser')->name('admin.crudUser');
Route::get('/unconfirmedStudio', 'AdminController@unconfirmedStudio')->name('admin.unconfirmedStudio');
Route::post('/unconfirmStudio', 'AdminController@unconfirmStudio')->name('admin.unconfirmStudio');
Route::post('/confirmStudio', 'AdminController@confirmStudio')->name('admin.confirmStudio');
Route::get('/detailConfirmStudio/{id}', 'AdminController@detailConfirmStudio')->name('admin.detailConfirmStudio');
Route::post('/banStudio', 'AdminController@banStudio')->name('admin.banStudio');
Route::post('/unbanStudio', 'AdminController@unbanStudio')->name('admin.unbanStudio');


