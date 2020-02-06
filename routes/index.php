<?php
	
Route::group(['namespace' => 'HskyZhou\LaravelBackendPermission', 'prefix' => config('laravel-backend-permission.url_prefix')], function () {
	/*用户*/
    require __DIR__ . '/user.php';
    /*角色*/
    require __DIR__ . '/role.php';
    // 权限
    require __DIR__ . '/permission.php';
    // 菜单
    require __DIR__ . '/menu.php';
});