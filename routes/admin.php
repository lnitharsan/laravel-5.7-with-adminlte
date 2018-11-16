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

Route::get('/', 'Admin\HomeController@dashboard')->name('home');
Route::get('/dashboard', 'Admin\HomeController@dashboard')->name('dashboard');

# Managers
Route::get('/managers', 'Admin\ManagerController@index')->name('managers');
Route::get('/managers/create', 'Admin\ManagerController@create')->name('managers.create');
Route::post('/managers', 'Admin\ManagerController@store')->name('managers.store');
Route::get('/managers/{id}', 'Admin\ManagerController@show')->name('managers.show');
Route::get('/managers/{id}/edit', 'Admin\ManagerController@edit')->name('managers.edit');
Route::put('/managers/{id}', 'Admin\ManagerController@update')->name('managers.update');
Route::delete('/managers/{id}', 'Admin\ManagerController@destroy')->name('managers.destroy');

# Role
Route::get('/roles', 'Admin\RoleController@index')->name('roles');
Route::get('/roles/create', 'Admin\RoleController@create')->name('roles.create');
Route::post('/roles', 'Admin\RoleController@store')->name('roles.store');
Route::get('/roles/{id}', 'Admin\RoleController@show')->name('roles.show');
Route::get('/roles/{id}/edit', 'Admin\RoleController@edit')->name('roles.edit');
Route::put('/roles/{id}', 'Admin\RoleController@update')->name('roles.update');
Route::delete('/roles/{id}', 'Admin\RoleController@destroy')->name('roles.destroy');

# Assign Permission, Roll
Route::post('/assign_permissions', 'Admin\RoleController@assignPermission')->name('assign.permissions');
Route::post('/assign_roles', 'Admin\RoleController@assignRole')->name('assign.roles');