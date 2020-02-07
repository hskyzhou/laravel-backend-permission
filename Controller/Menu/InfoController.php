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

		$data = (new Resource($info))->toArray($request);

		$parentMenu = $info->parentMenu->first();

		if (!is_null($parentMenu)) {
			$data['parent_menu'] = (new Resource($parentMenu))->toArray($request);
		} else {
			$data['parent_menu'] = null;
		}

		$data = [
			'info' => $data
		];

		return response()->hskyApi($data);
	}
}