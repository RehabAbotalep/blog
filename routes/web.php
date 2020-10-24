<?php

//User Routes
Route::group(['namespace' =>'User','middleware'=>'auth'], function(){
	Route::get('/', 'HomeController@index')->name('home');
	
	Route::get('/post/{slug}', 'PostController@post')->name('post');

	Route::get('/post/category/{category}','HomeController@category')->name('category');

	Route::get('/post/tag/{tag}','HomeController@tag')->name('tag');
});

//Admin Routes
Route::group(['namespace' =>'Admin'], function(){

	Route::get('/admin/home','HomeController@index');

	//Posts Route
	Route::resource('admin/post','PostController');

	//Tag Routes
	Route::resource('admin/tag','TagController');

	//Category Routes
	Route::resource('admin/category','CategoryController');

	//Users Routes
	Route::resource('admin/user','UserController');

	//Roles Route
	Route::resource('admin/role','RoleController');

	//Permissions Route
	Route::resource('admin/permission', 'PermissionController');

	//Admin Auth Routes
	Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('admin.login');

    Route::post('admin/login', 'Auth\LoginController@login');

    Route::post('admin/logout' ,'Auth\LoginController@logout')->name('admin.logout');
});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
