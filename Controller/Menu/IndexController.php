<?php

namespace HskyZhou\LaravelBackendPermission\Menu;

use HskyZhou\LaravelBackendPermission\Services\MenuService as Service;
use HskyZhou\LaravelBackendPermission\Resources\Menu\IndexCollection;
use HskyZhou\LaravelBackendPermission\Controller\Controller;

/*用户列表*/
class IndexController extends Controller {

	protected $moduleName = 'menu';

	protected $controllerName = 'index';

	/**
	 * 用户列表
	 * @return [type] [description]
	 */
	public function __invoke(Service $service)
	{
		/*获取用户列表*/
		$list = $service->getMenuListPaginate();

		$data = new IndexCollection($list);

		return response()->hskyApi($data);
	}
}