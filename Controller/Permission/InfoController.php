<?php

namespace HskyZhou\LaravelBackendPermission\Permission;

use HskyZhou\LaravelBackendPermission\Services\PermissionService as Service;
use HskyZhou\LaravelBackendPermission\Resources\Permission\Resource;
use HskyZhou\LaravelBackendPermission\Requests\Permission\InfoRequest;
use HskyZhou\LaravelBackendPermission\Controller\Controller;

/*用户详情*/
class InfoController extends Controller {

	protected $moduleName = 'permission';

	protected $controllerName = 'info';

	/**
	 * 用户详情
	 * @return [type] [description]
	 */
	public function __invoke(InfoRequest $request, Service $service)
	{
		// 获取搜索的用户id
		$id = $this->getKeyId();

		/*获取用户列表*/
		$info = $service->permissionInfo($id);

		$info = new Resource($info);

		$data = [
			'info' => $info
		];

		return response()->hskyApi($data);
	}
}