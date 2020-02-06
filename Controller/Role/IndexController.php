<?php

namespace HskyZhou\LaravelBackendPermission\Role;

use HskyZhou\LaravelBackendPermission\Services\RoleService;
use HskyZhou\LaravelBackendPermission\Resources\Role\IndexCollection as RoleIndexCollection;
use HskyZhou\LaravelBackendPermission\Controller\Controller;

/*用户列表*/
class IndexController extends Controller {

	protected $moduleName = 'role';
	protected $controllerName = 'index';

	/**
	 * 用户列表
	 * @return [type] [description]
	 */
	public function __invoke(RoleService $roleService)
	{
		$searchs = $this->getSearchs();

		/*获取用户列表*/
		$roleList = $roleService->getRoleListPaginate($searchs);

		$data = new RoleIndexCollection($roleList);

		return response()->hskyApi($data);
	}
}