<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
  Route::get('/', [
    'as' => 'home',
    'uses' => 'HomeController@index'
  ]);
});
