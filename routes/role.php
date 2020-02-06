<?php

Route::group(['namespace' => 'Role', 'prefix' => 'role'], function () {
	/*用户列表*/
	Route::post('index', 'IndexController');
	/*用户详情*/
	Route::post('info', 'InfoController');
	/*用户保存*/
	Route::post('store', 'StoreController');
	/*用户修改*/
	Route::post('update', 'UpdateController');
	/*用户删除*/
	Route::post('delete', 'DeleteController');
});
