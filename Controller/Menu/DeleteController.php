<?php

namespace HskyZhou\LaravelBackendPermission\Menu;

use HskyZhou\LaravelBackendPermission\Services\MenuService as Service;
use HskyZhou\LaravelBackendPermission\Requests\Menu\DeleteRequest;
use HskyZhou\LaravelBackendPermission\Controller\Controller;

/*用户详情*/
class DeleteController extends Controller {

	protected $moduleName = 'menu';

	protected $controllerName = 'delete';

	/**
	 * 用户详情
	 * @return [type] [description]
	 */
	public function __invoke(DeleteRequest $request, Service $service)
	{
		// 获取搜索的用户id
		$id = $this->getKeyId();

		/*修改用户*/
		$service->menuDelete($id);


		return response()->hskyApi();
	}
}