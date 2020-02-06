<?php

namespace HskyZhou\LaravelBackendPermission\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use HskyZhou\LaravelBackendPermission\Repositories\Interfaces\MenuRepository;

/**
 * Class MenuRepositoryEloquent.
 *
 * @package namespace HskyZhou\LaravelBackendPermission\Repositories\Eloquents;
 */
class MenuRepositoryEloquent extends BaseRepository implements MenuRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return config('laravel-backend-permission.models.menu');
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
    }
    
}
