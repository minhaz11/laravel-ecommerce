<?php


Route::get('/', "FrontendController@index") ;

//Admin Dashboard Routes
  //-----Category Routes----//
  Route::get('category/create', 'CategoryController@create')->name('createCategory');
  Route::post('category/create', 'CategoryController@store')->name('storeCategory');
  Route::get('category/manage', 'CategoryController@show')->name('manageCategory');
  Route::get('category/manage-publication/{id}', 'CategoryController@publicationManage')->name('publicationManage');
  Route::get('category/delete/{id}', 'CategoryController@destroy')->name('deleteCategory');
  Route::get('category/edit/{id}', 'CategoryController@edit')->name('editCategory');
  Route::post('category/edit/{id}', 'CategoryController@update')->name('updateCategory');





  Auth::routes();

Route::get('/admin-dashboard', 'HomeController@index')->name('home');
