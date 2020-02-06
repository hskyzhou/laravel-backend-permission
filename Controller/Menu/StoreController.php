<?php

namespace HskyZhou\LaravelBackendPermission\Menu;

use HskyZhou\LaravelBackendPermission\Services\MenuService as Service;
use HskyZhou\LaravelBackendPermission\Resources\Menu\Resource;
use HskyZhou\LaravelBackendPermission\Requests\Menu\StoreRequest as Request;
use Spatie\Permission\Guard;
use HskyZhou\LaravelBackendPermission\Controller\Controller;

/*用户详情*/
class StoreController extends Controller {

	protected $moduleName = 'menu';

	protected $controllerName = 'store';

	/**
	 * 用户详情
	 * @return [type] [description]
	 */
	public function __invoke(Request $request, Service $service)
	{
		$data = $this->getData();

		/*获取用户列表*/
		$info = $service->menuSave($data);

		$info = new Resource($info);

		$data = [
			'info' => $info
		];

		return response()->hskyApi($data);
	}
}