<?php

namespace HskyZhou\LaravelBackendPermission;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class LaravelBackendPermissionServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // 合并配置文件
        $this->mergeConfigFrom(__DIR__ . '/config/laravel-backend-permission.php', 'laravel-backend-permission');

        // 合并路由
        $this->loadRoutesFrom(__DIR__ . '/routes/index.php');

        // 数据库迁移
        $this->loadMigrationsFrom(__DIR__ . '/migrations/2020_02_03_000000_create_menu_recursive_table.php');
        $this->loadMigrationsFrom(__DIR__ . '/migrations/2020_02_03_000000_create_menu_table.php');
        $this->loadMigrationsFrom(__DIR__ . '/migrations/2020_02_03_000000_add_show_name_to_role_table.php');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 输出配置文件
        $this->publishes([
            __DIR__ . '/config/laravel-backend-permission.php' => config_path('laravel-backend-permission.php')
        ]);

        $this->app->bind(\HskyZhou\LaravelBackendPermission\Repositories\Interfaces\UserRepository::class, \HskyZhou\LaravelBackendPermission\Repositories\Eloquents\UserRepositoryEloquent::class);
        $this->app->bind(\HskyZhou\LaravelBackendPermission\Repositories\Interfaces\RoleRepository::class, \HskyZhou\LaravelBackendPermission\Repositories\Eloquents\RoleRepositoryEloquent::class);
        $this->app->bind(\HskyZhou\LaravelBackendPermission\Repositories\Interfaces\PermissionRepository::class, \HskyZhou\LaravelBackendPermission\Repositories\Eloquents\PermissionRepositoryEloquent::class);
        $this->app->bind(\HskyZhou\LaravelBackendPermission\Repositories\Interfaces\MenuRepository::class, \HskyZhou\LaravelBackendPermission\Repositories\Eloquents\MenuRepositoryEloquent::class);

        /*api 结果*/
        Response::macro('hskyApi', function ($data=[], $message='', $code=200) {
            $defaultResults = config('laravel-backend-permission.results');

            $results = [];
            foreach ($defaultResults as $key => $val) {
                if ($val['show']) {
                    $results[$val['label']] = $$key;
                }
            }

            return response()->json($results);
        });
    }
}