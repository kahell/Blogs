<?php

// User Route
Route::namespace('user')->group(function () {
  Route::get('/', 'HomeController@index')->name('home');
});

// Admin Route
Route::namespace('Admin')->group(function () {
  Route::get('admin/home', 'HomeController@index')->name('admin.home');
  // User Route
  Route::resource('admin/user','UserController');
  // Post Route
  Route::resource('admin/post','PostController');
  // Category Route
  Route::resource('admin/category','CategoryController');
  // Tag Route
  Route::resource('admin/tag','TagController');
});
