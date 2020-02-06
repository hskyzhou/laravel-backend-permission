<?php

namespace HskyZhou\LaravelBackendPermission\Role;

use HskyZhou\LaravelBackendPermission\Services\RoleService;
use HskyZhou\LaravelBackendPermission\Requests\Role\DeleteRequest;
use HskyZhou\LaravelBackendPermission\Controller\Controller;

/*用户详情*/
class DeleteController extends Controller {

	protected $moduleName = 'role';
	protected $controllerName = 'delete';

	/**
	 * 用户详情
	 * @return [type] [description]
	 */
	public function __invoke(DeleteRequest $request, RoleService $roleService)
	{
		// 获取搜索的用户id
		$id = $this->getKeyId();

		/*修改用户*/
		$roleService->roleDelete($id);


		return response()->hskyApi();
	}
}