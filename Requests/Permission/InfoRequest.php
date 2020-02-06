<?php

namespace HskyZhou\LaravelBackendPermission\Requests\Permission;

use HskyZhou\LaravelBackendPermission\Requests\Request;

class InfoRequest extends Request
{
    protected $moduleName = 'permission';
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
