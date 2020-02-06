<?php

namespace HskyZhou\LaravelBackendPermission\Requests\Role;

use HskyZhou\LaravelBackendPermission\Requests\Request;

class InfoRequest extends Request
{
    protected $moduleName = 'role';
    protected $controllerName = 'info';
    
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
