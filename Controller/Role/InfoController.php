<?php

namespace HskyZhou\LaravelBackendPermission\Role;

use HskyZhou\LaravelBackendPermission\Services\RoleService;
use HskyZhou\LaravelBackendPermission\Resources\Role\RoleResource;
use HskyZhou\LaravelBackendPermission\Requests\Role\InfoRequest;
use HskyZhou\LaravelBackendPermission\Controller\Controller;

/*用户详情*/
class InfoController extends Controller {

	protected $moduleName = 'role';
	protected $controllerName = 'info';

	/**
	 * 用户详情
	 * @return [type] [description]
	 */
	public function __invoke(InfoRequest $request, RoleService $roleService)
	{
		// 获取搜索的用户id
		$id = $this->getKeyId();

		/*获取用户列表*/
		$roleInfo = $roleService->roleInfo($id);

		$info = new RoleResource($roleInfo);

		$data = [
			'info' => $info
		];

		return response()->hskyApi($data);
	}
}