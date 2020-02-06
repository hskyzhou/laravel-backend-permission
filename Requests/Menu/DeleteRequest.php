<?php

namespace HskyZhou\LaravelBackendPermission\Requests\Menu;

use HskyZhou\LaravelBackendPermission\Requests\Request;

class DeleteRequest extends Request
{
    protected $moduleName = 'menu';
    protected $controllerName = 'delete';
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
