<?php


Route::get('/', "FrontendController@index")->name('index') ;


//Admin Dashboard Routes
  //-----Category Routes----//
  Route::get('category/create', 'CategoryController@create')->name('createCategory');
  Route::post('category/create', 'CategoryController@store')->name('storeCategory');
  Route::get('category/manage', 'CategoryController@show')->name('manageCategory');
  Route::get('category/manage-publication/{id}', 'CategoryController@publicationManage')->name('publicationManage');
  Route::get('category/delete/{id}', 'CategoryController@destroy')->name('deleteCategory');
  Route::get('category/edit/{id}', 'CategoryController@edit')->name('editCategory');
  Route::post('category/edit/{id}', 'CategoryController@update')->name('updateCategory');

  //----Product Routes----//
  Route::get('product/add', 'ProductController@create')->name('createProduct');

  Route::post('product/add', 'ProductController@store')->name('storeProduct');

  Route::get('product/manage', 'ProductController@show')->name('manageProduct');

  Route::get('product/manage-publication/{id}', 'ProductController@publicationManage')->name('managePublication');

  Route::get('product/delete/{id}', 'ProductController@destroy')->name('deleteProduct');

  Route::get('product/edit/{id}', 'ProductController@edit')->name('editProduct');

  Route::post('product/edit/{id}', 'ProductController@update')->name('updateProduct');

  Route::get('product/trashed', 'ProductController@showTrashed')->name('trashedProduct');

  Route::get('product/restore/{id}', 'ProductController@restore')->name('restoreProduct');

  Route::get('product/force-delete/{id}', 'ProductController@forceDelete')->name('p_deleteProduct');

  //---Front End category wised product view----//
  Route::get('/categories/products/view/{id}', 'FrontendController@productList')->name('cat_product');
  Route::get('product/details/{id}', 'FrontendController@productDetails')->name('productDetails');





  Auth::routes();

Route::get('/admin-dashboard', 'HomeController@index')->name('home');
