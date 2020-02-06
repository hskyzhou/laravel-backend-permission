<?php

namespace HskyZhou\LaravelBackendPermission\Permission;

use HskyZhou\LaravelBackendPermission\Services\PermissionService;
use HskyZhou\LaravelBackendPermission\Resources\Permission\IndexCollection;
use HskyZhou\LaravelBackendPermission\Controller\Controller;

/*用户列表*/
class IndexController extends Controller {

	protected $moduleName = 'permission';
	protected $controllerName = 'index';

	/**
	 * 用户列表
	 * @return [type] [description]
	 */
	public function __invoke(PermissionService $service)
	{
		$searchs = $this->getSearchs();

		/*获取用户列表*/
		$roleList = $service->getPermissionListPaginate($searchs);

		$data = new IndexCollection($roleList);

		return response()->hskyApi($data);
	}
}