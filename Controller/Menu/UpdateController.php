<?php

namespace HskyZhou\LaravelBackendPermission\Menu;

use HskyZhou\LaravelBackendPermission\Services\MenuService as Service;
use HskyZhou\LaravelBackendPermission\Resources\Menu\Resource;
use HskyZhou\LaravelBackendPermission\Requests\Menu\UpdateRequest as Request;
use Spatie\Permission\Guard;
use HskyZhou\LaravelBackendPermission\Controller\Controller;

/*用户详情*/
class UpdateController extends Controller {

	protected $moduleName = 'menu';

	protected $controllerName = 'update';

	/**
	 * 用户详情
	 * @return [type] [description]
	 */
	public function __invoke(Request $request, Service $service)
	{
		$data = $this->getData();

		$id = $this->getKeyId();

		/*修改用户*/
		$info = $service->menuUpdate($data, $id);

		$info = new Resource($info);

		$data = [
			'info' => $info
		];

		return response()->hskyApi($data);
	}
}