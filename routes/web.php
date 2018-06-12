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
Route::get('/regisStudio', 'HomeController@regisStudio')->name('home.regisStudio');
Route::get('/regisUlangStudio', 'StudioMusikController@regisUlangStudio')->name('studioMusik.regisUlangStudio');
Route::get('/detailStudio/{id}', 'HomeController@detailStudio')->name('index.detailStudio');
Route::post('/updateStudio', ['middleware' => 'auth', 'uses'=> 'StudioMusikController@updateStudio'])->name('studioMusik.updateStudio');
Route::get('/regisUser', 'HomeController@regisUser')->name('home.regisUser');

Route::get('/bookStudio/{id}', 'BookingController@bookStudio')->name('home.bookStudio');
Route::post('/rekapBooking', 'BookingController@rekapBooking')->name('booking.rekapBooking');

Route::post('/hapusStudio/{id}', 'StudioController@hapusStudio')->name('studio.hapusStudio');

Route::get('verify', 'StudioMusikController@verify')->name('studioMusik.verify');
Route::post('resendVerifikasi', 'StudioMusikController@resendVerifikasi')->name('studioMusik.resendVerifikasi');

//Route::get('protected', ['middleware' => ['auth', 'admin'], function() {
//    return view("admin.home");
//}]);

Route::get('/userBooking', 'PenyewaController@userBooking')->name('penyewa.userBooking');
Route::get('/userProfile', 'PenyewaController@userProfile')->name('penyewa.userProfile');



Route::post('/confirm', 'BookingController@confirm')->name('booking.confirm');
Route::post('/cancel', 'BookingController@cancel')->name('booking.cancel');

Route::get('/studioPreview/{id}', 'StudioController@studioPreview')->name('studio.studioPreview');
Route::get('/studioMusikPreview/{id}', 'StudioMusikController@studioMusikPreview')->name('studioMusik.studioMusikPreview');
Route::get('/createStudio/{id}', 'StudioController@createStudio')->name('studio.createStudio');
Route::get('/studioRoom/{id}', 'StudioMusikController@studioRoom')->name('studioMusik.studioRoom');
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
Route::post('/banUser', 'AdminController@banUser')->name('admin.banUser');
Route::post('/unbanUser', 'AdminController@unbanUser')->name('admin.unbanUser');

Route::get('/selesaiBooking', 'StudioMusikController@selesaiBooking')->name('admin.selesaiBooking');

Route::get('/alreadyOnline', 'HomeController@alreadyOnline')->name('home.alreadyOnline');
Route::get('/banned', 'HomeController@banned')->name('home.banned');

Route::post('/store2', 'StudioMusikController@store2')->name('studioMusik.store2');
Route::post('/storeOffline', 'BookingController@storeOffline')->name('booking.storeOffline');

