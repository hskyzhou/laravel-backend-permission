<?php

namespace HskyZhou\LaravelBackendPermission\Requests\Permission;

use HskyZhou\LaravelBackendPermission\Requests\Request;

class UpdateRequest extends Request
{
    protected $moduleName = 'permission';
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
