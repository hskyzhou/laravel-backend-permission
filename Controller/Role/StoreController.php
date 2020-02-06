<?php

namespace HskyZhou\LaravelBackendPermission\Role;

use HskyZhou\LaravelBackendPermission\Services\RoleService;
use HskyZhou\LaravelBackendPermission\Resources\Role\RoleResource;
use HskyZhou\LaravelBackendPermission\Requests\Role\StoreRequest;
use Spatie\Permission\Guard;
use HskyZhou\LaravelBackendPermission\Controller\Controller;
use DB;

/*用户详情*/
class StoreController extends Controller {

	protected $moduleName = 'role';
	protected $controllerName = 'store';

	/**
	 * 用户详情
	 * @return [type] [description]
	 */
	public function __invoke(StoreRequest $request, RoleService $roleService)
	{
		return DB::transaction(function () use ($roleService) {
			$data = $this->getData();
			$data['guard_name'] = Guard::getDefaultName(static::class);

			/*获取用户列表*/
			$roleInfo = $roleService->roleSave($data);

			// 角色分配权限
			$permissions = request('permissions', []);
			$roleInfo->givePermissionTo($permissions);

			$info = new RoleResource($roleInfo);

			$data = [
				'info' => $info
			];

			return response()->hskyApi($data);
		});
	}
}