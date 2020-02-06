<?php

namespace HskyZhou\LaravelBackendPermission\Menu;

use HskyZhou\LaravelBackendPermission\Services\MenuService as Service;
use HskyZhou\LaravelBackendPermission\Resources\Menu\Resource;
use HskyZhou\LaravelBackendPermission\Requests\Menu\InfoRequest as Request;
use HskyZhou\LaravelBackendPermission\Controller\Controller;

/*用户详情*/
class InfoController extends Controller {

	protected $moduleName = 'menu';

	protected $controllerName = 'info';

	/**
	 * 用户详情
	 * @return [type] [description]
	 */
	public function __invoke(Request $request, Service $service)
	{
		// 获取搜索的用户id
		$id = $this->getKeyId();

		/*获取用户列表*/
		$info = $service->menuInfo($id);

		$info = new Resource($info);

		$data = [
			'info' => $info
		];

		return response()->hskyApi($data);
	}
}