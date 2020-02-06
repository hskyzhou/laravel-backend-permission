<?php

namespace HskyZhou\LaravelBackendPermission\Role;

use HskyZhou\LaravelBackendPermission\Services\RoleService;
use HskyZhou\LaravelBackendPermission\Resources\Role\RoleResource;
use HskyZhou\LaravelBackendPermission\Requests\Role\UpdateRequest;
use Spatie\Permission\Guard;
use HskyZhou\LaravelBackendPermission\Controller\Controller;
use DB;

/*用户详情*/
class UpdateController extends Controller {

	protected $moduleName = 'role';
	protected $controllerName = 'update';

	/**
	 * 用户详情
	 * @return [type] [description]
	 */
	public function __invoke(UpdateRequest $request, RoleService $roleService)
	{
		return DB::transaction(function () use ($roleService) {
			$id = $this->getKeyId();
			
			$data = $this->getData();
			// 获取搜索的用户id
			$data['guard_name'] = Guard::getDefaultName(static::class);
			/*修改用户*/
			$roleInfo = $roleService->roleUpdate($data, $id);

			// 修改角色权限
			$permissions = request('permissions', []);
			$roleInfo->syncPermissions($permissions);

			$info = new RoleResource($roleInfo);

			$data = [
				'info' => $info
			];

			return response()->hskyApi($data);
		});
	}
}