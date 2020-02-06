<?php

namespace HskyZhou\LaravelBackendPermission\Permission;

use HskyZhou\LaravelBackendPermission\Services\PermissionService as Service;
use HskyZhou\LaravelBackendPermission\Resources\Permission\Resource;
use HskyZhou\LaravelBackendPermission\Requests\Permission\UpdateRequest as Request;
use Spatie\Permission\Guard;
use HskyZhou\LaravelBackendPermission\Controller\Controller;

/*用户详情*/
class UpdateController extends Controller {

	protected $moduleName = 'permission';

	protected $controllerName = 'update';
	
	/**
	 * 用户详情
	 * @return [type] [description]
	 */
	public function __invoke(Request $request, Service $service)
	{
		$id = $this->getKeyId();

		$data = $this->getData();
		$data['guard_name'] = Guard::getDefaultName(static::class);

		/*修改用户*/
		$info = $service->permissionUpdate($data, $id);

		$info = new Resource($info);

		$data = [
			'info' => $info
		];

		return response()->hskyApi($data);
	}
}