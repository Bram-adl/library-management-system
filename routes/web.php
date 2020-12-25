<?php

use Illuminate\Support\Facades\Route;

/**
 * ROUTES FOR AUTHENTICATION
 */

Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@index')->name('register');
Route::post('/register', 'Auth\RegisterController@register');

Route::post('/logout', 'Auth\LogoutController@logout')->name('logout');

/**
 * ROUTES FOR ADMIN.
 */

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', 'Admin\DashboardController@dashboard')->name('admin.dashboard');

    Route::resources([
        'books' => 'BookController',
        'members' => 'MemberController',
        'circulations' => 'CirculationController',
        'users' => 'UserController',
    ]);
});

/**
 * ROUTES FOR CLIENT.
 */
