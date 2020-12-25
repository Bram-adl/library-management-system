<?php

use Illuminate\Support\Facades\Route;

/**
 * ROUTES FOR ADMIN.
 */

Route::get('/dashboard', 'Admin\DashboardController@dashboard')->name('admin.dashboard');

Route::resources([
    'books' => 'BookController',
    'members' => 'MemberController',
    'circulations' => 'CirculationController',
    'users' => 'UserController',
]);