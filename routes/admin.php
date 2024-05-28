<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
  Route::resource('user', 'AdminUserController', [
    'only' => ['index', 'edit', 'update']
  ]);
  Route::get('dashboard/user', [
    'as' => 'user.dashboard',
    'uses' => 'AdminUserController@dashboard'
  ]);
});
