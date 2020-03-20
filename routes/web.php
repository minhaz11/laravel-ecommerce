<?php


Route::get('/', "FrontendController@index") ;

//Admin Dashboard Routes
  //-----Category Routes----//
  Route::get('category/create', 'CategoryController@create')->name('createCategory');
  Route::post('category/create', 'CategoryController@store')->name('storeCategory');





  Auth::routes();

Route::get('/admin-dashboard', 'HomeController@index')->name('home');
