<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::middleware(['auth:admin'])->group(function(){


    Route::get('admin/home', 'AdminController@index')->name('dashboard.welcome');

    Route::get('admin/register', 'Admin\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('admin/register', 'Admin\RegisterController@register');

    Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin', 'Admin\LoginController@login');
    // Route::post('admin/logout', 'Admin\LoginController@logout')->name('admin.logout');
    Route::get('admin-password/confirm', 'Admin\ConfirmPasswordController@showConfirmForm')->name('admin.password.confirm');
    Route::post('admin-password/confirm', 'Admin\ConfirmPasswordController@confirm');

    Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

    Route::get('admin-password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('admin-password/reset', 'Admin\ResetPasswordController@reset')->name('admin.password.update');

    Route::get('admin-password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

// });

//user routes
Route::resource('employees', 'EmployeeController');

//Departement routes
Route::resource('departments', 'DepartmentController');

//Position routes
Route::resource('positions', 'PositionController');

