<?php

namespace HskyZhou\LaravelBackendPermission\Permission;

use HskyZhou\LaravelBackendPermission\Services\PermissionService;
use HskyZhou\LaravelBackendPermission\Requests\Permission\DeleteRequest;
use HskyZhou\LaravelBackendPermission\Controller\Controller;

/*用户详情*/
class DeleteController extends Controller {

	protected $moduleName = 'role';
	protected $controllerName = 'delete';
	/**
	 * 用户详情
	 * @return [type] [description]
	 */
	public function __invoke(DeleteRequest $request, PermissionService $service)
	{
		// 获取搜索的用户id
		$id = $this->getKeyId();

		/*修改用户*/
		$service->permissionDelete($id);


		return response()->hskyApi();
	}
}