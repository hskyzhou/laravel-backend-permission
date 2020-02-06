<?php

namespace HskyZhou\LaravelBackendPermission\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use HskyZhou\LaravelBackendPermission\Repositories\Interfaces\UserRepository;
use HskyZhou\LaravelBackendPermission\Traits\RepositoryTrait;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace HskyZhou\LaravelBackendPermission\Repositories\Eloquents;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    use RepositoryTrait;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return config('laravel-backend-permission.models.user');
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
    }
    
}
