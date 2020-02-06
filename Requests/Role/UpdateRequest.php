<?php

namespace HskyZhou\LaravelBackendPermission\Requests\Role;

use HskyZhou\LaravelBackendPermission\Requests\Request;

class UpdateRequest extends Request
{
    protected $moduleName = 'role';
    protected $controllerName = 'update';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
