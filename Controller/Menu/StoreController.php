<?php

namespace HskyZhou\LaravelBackendPermission\Menu;

use HskyZhou\LaravelBackendPermission\Services\MenuService as Service;
use HskyZhou\LaravelBackendPermission\Resources\Menu\Resource;
use HskyZhou\LaravelBackendPermission\Requests\Menu\StoreRequest as Request;
use Spatie\Permission\Guard;
use HskyZhou\LaravelBackendPermission\Controller\Controller;
use DB;

/*菜单详情*/
class StoreController extends Controller {

	protected $moduleName = 'menu';

	protected $controllerName = 'store';

	/**
	 * 菜单详情
	 * @return [type] [description]
	 */
	public function __invoke(Request $request, Service $service)
	{
		return DB::transaction(function () use ($service) {
			$data = $this->getData();

			/*获取菜单列表*/
			$info = $service->menuSave($data);

			$info = new Resource($info);

			$data = [
				'info' => $info
			];

			return response()->hskyApi($data);

		});
	}
}