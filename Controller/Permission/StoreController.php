<?php

namespace HskyZhou\LaravelBackendPermission\Permission;

use HskyZhou\LaravelBackendPermission\Services\PermissionService as Service;
use HskyZhou\LaravelBackendPermission\Resources\Permission\Resource;
use HskyZhou\LaravelBackendPermission\Requests\Permission\StoreRequest as Request;
use Spatie\Permission\Guard;
use HskyZhou\LaravelBackendPermission\Controller\Controller;

/*用户详情*/
class StoreController extends Controller {

	protected $moduleName = 'permission';
	protected $controllerName = 'store';
	
	/**
	 * 用户详情
	 * @return [type] [description]
	 */
	public function __invoke(Request $request, Service $service)
	{
		$data = $this->getData();
		$data['guard_name'] = Guard::getDefaultName(static::class);

		/*获取用户列表*/
		$roleInfo = $service->permissionSave($data);

		$info = new Resource($roleInfo);

		$data = [
			'info' => $info
		];

		return response()->hskyApi($data);
	}
}