<?php

Route::group(['namespace' => 'Menu', 'prefix' => 'menu'], function () {
	/*菜单列表*/
	Route::post('index', 'IndexController');
	/*菜单详情*/
	Route::post('info', 'InfoController');
	/*菜单保存*/
	Route::post('store', 'StoreController');
	/*菜单修改*/
	Route::post('update', 'UpdateController');
	/*菜单删除*/
	Route::post('delete', 'DeleteController');
	// 菜单排序
	Route::post('sort', 'SortController');
});
