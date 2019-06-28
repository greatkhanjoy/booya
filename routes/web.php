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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::post('/','Backend\userLoginController@login')->name('user.login');
Route::get('/','Backend\userLoginController@show')->name('show.login');
Route::group(['prefix' => '/admin'], function(){
Route::get('/','Backend\adminPageController@index')->name('Dashboard')->middleware('checkrole');
});


//Backend User Routes
Route::group(['prefix' => '/admin/users'], function(){
Route::get('/', 'Backend\UsersPageController@index')->name('Users')->middleware('checkrole');
Route::get('/pending', 'Backend\UsersPageController@showPending')->name('Pending users')->middleware('checkrole');
Route::get('/deactive', 'Backend\UsersPageController@showDeactive')->name('Deactive users')->middleware('checkrole');
Route::get('/ban', 'Backend\UsersPageController@showBanned')->name('Banned users')->middleware('checkrole');
Route::get('/profile', 'Backend\UserProfile@index')->name('User');
Route::post('/user/{id}', 'Backend\UserProfile@update')->name('update.user.profile')->middleware('checkrole');

Route::get('/new', 'Backend\UsersController@create')->name('Add new user')->middleware('checkrole');
Route::post('/new', 'Backend\UsersController@store')->name('store.user');
Route::get('/edit/{id}', 'Backend\UsersController@edit')->name('Edit User')->middleware('checkrole');
Route::post('/edit/{id}', 'Backend\UsersController@update')->name('update.user');
Route::post('/edit2/{id}', 'Backend\UsersController@updatepin')->name('update.userpin');
Route::post('/edit3/{id}', 'Backend\UsersController@updatephoto')->name('update.userphoto');
Route::post('/delete/{id}', 'Backend\UsersController@destroy')->name('delete.user');
Route::get('/stat', 'Backend\UsersController@statChange')->name('user.change.status');
Route::post('/sms', 'Backend\BulkSmsController@sendSms')->name('user.sms');
Route::get('/message', 'Backend\UsersController@message')->name('Message')->middleware('checkrole');
Route::post('/message', 'Backend\UsersController@storeMessage')->name('user.message');
Route::get('/messagestat', 'Backend\UsersController@updateMessageStatus')->name('user.message.status');

});
//Verification
Route::group(['prefix' => '/verify'], function(){
Route::get('/{token}', 'Frontend\Verification@verify')->name('User Verification');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
