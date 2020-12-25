<?php

use Illuminate\Support\Facades\Route;

/**
 * ROUTES FOR ADMIN.
 */

Route::get('/dashboard', 'Admin\DashboardController@dashboard')->name('admin.dashboard');

// Route::get('/members', 'Admin\DashboardController@members')->name('admin.members');
Route::get('/circulations', 'Admin\DashboardController@circulations')->name('admin.circulations');
Route::get('/users/{id}', 'Admin\DashboardController@users')->name('admin.users');

Route::resources([
    'books' => 'BookController',
    'members' => 'MemberController',
    // 'circulations' => 'CirculationController',
    // 'users' => 'UserController',
]);