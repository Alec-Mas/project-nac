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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

# Dashboard Route

Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('dashboard');

Route::get('/', 'JobController@index')->name('home');

Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('jobs', 'JobController');

Route::resource('companies', 'CompanyController');

# Company Routes
Route::group(['middleware' => 'auth'], function() {
    Route::get('/search','CompanyController@search');
    Route::post('/link','CompanyController@link');
    # Protect the route
    Route::get('/link', function()
    {
        abort('401');
    });
    Route::post('/unlink','CompanyController@unlink');
    # Protect the route
    Route::get('/unlink', function()
    {
        abort('401');
    });
});
