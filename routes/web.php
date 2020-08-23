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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
// Authenticated user
// Auth::routes();
/*
Laravel includes the Auth\VerificationController class that contains the necessary logic
to send verification links and verify emails.
To register the necessary routes for this controller, pass the verify option to the Auth::routes method:
*/
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');

// Jobs
Route::get('/', 'JobController@index');
Route::get('jobs/{id}/{job}','JobController@show')->name('jobs.show');
Route::get('jobs/create','JobController@create')->name('jobs.create');
Route::post('jobs/store','JobController@store')->name('jobs.store');
Route::get('jobs/myjob','JobController@myjob')->name('jobs.myjob');
Route::get('/jobs/{id}/edit','JobController@edit')->name('jobs.edit');
Route::get('jobs/{id}/update','JobController@update')->name('jobs.update');
// employee can view applicants
Route::get('jobs/applications','JobController@applicant')->name('applicant');

Route::post('/applications/{id}','JobController@apply')->name('apply');

// Company
Route::get('company/{id}/{company}','CompanyController@index')->name('company.index');
Route::get('company/create','CompanyController@create')->name('company.view');
Route::post('company/store','CompanyController@store')->name('company.store');
Route::post('company/logo','CompanyController@companyLogo')->name('company.logo');
Route::post('company/coverphoto','CompanyController@coverPhoto')->name('cover.photo');

// user profile
Route::get('user/profile','UserController@index')->name('user.profile');
Route::post('user/profile/create', 'UserController@store')->name('profile.create');
Route::post('user/coverletter', 'UserController@coverletter')->name('cover.letter');
Route::post('user/resume', 'UserController@resume')->name('resume');
Route::post('user/avatar', 'UserController@avatar')->name('avatar');

// employer view - don't want controller and go to auth/employer-register.blade.php
Route::view('employer/register', 'auth.employer-register')->name('employer.register');
Route::post('employer/register','EmployerRegisterController@employerRegister')->name('emp.register');


