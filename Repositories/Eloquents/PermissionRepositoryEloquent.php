<?php

namespace HskyZhou\LaravelBackendPermission\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use HskyZhou\LaravelBackendPermission\Repositories\Interfaces\PermissionRepository;
use HskyZhou\LaravelBackendPermission\Traits\RepositoryTrait;

/**
 * Class PermissionRepositoryEloquent.
 *
 * @package namespace HskyZhou\LaravelBackendPermission\Repositories\Eloquents;
 */
class PermissionRepositoryEloquent extends BaseRepository implements PermissionRepository
{
    use RepositoryTrait;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return config('laravel-backend-permission.models.permission');
    }

    /**
     * 角色是否存在
     * @return boolean [description]
     */
    public function isExistsByGuardNameAndName($name, $guardName='', $id = null)
    {
        if ($id) {
            $this->model = $this->model->where('id', '<>', $id);
        }
        $results = $this->model->where('name', $name)->where('guard_name', $guardName)->exists();
        $this->resetModel();

        return $results;
    }
    
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
    }
}
