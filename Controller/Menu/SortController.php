<?php

namespace HskyZhou\LaravelBackendPermission\Menu;

use HskyZhou\LaravelBackendPermission\Services\MenuService as Service;
use HskyZhou\LaravelBackendPermission\Resources\Menu\Resource;
use Spatie\Permission\Guard;
use HskyZhou\LaravelBackendPermission\Controller\Controller;

/*菜单排序*/
class SortController extends Controller {

	protected $moduleName = 'menu';

	protected $controllerName = 'sort';

	/**
	 * 用户详情
	 * @return [type] [description]
	 */
	public function __invoke(Service $service)
	{
		$data = $this->getData();

		/*修改用户*/
		$menus = isset($data['menu']) ? $data['menu'] : [];
		
		$service->menuSort($menus);

		return response()->hskyApi();
	}
}