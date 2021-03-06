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

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');;
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/events','EventController');
Route::resource('/clubs','ClubController');
Route::resource('/users','UserController');


Route::post('/events/joinevent/{id}','EventController@joinEvent')->name('join.event');
Route::get('/events/viewparticipant/{id}','EventController@viewParticipant')->name('view.participant');
Route::post('/clubs/joinclub/{id}','ClubController@joinClub')->name('join.club');
Route::get('/clubs/clubevent/{id}','ClubController@viewClubEvents')->name('clubs.events');
Route::get('/clubs/clubmembers/{id}','ClubController@viewClubMembers')->name('clubs.members');
