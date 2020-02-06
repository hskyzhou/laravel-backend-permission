<?php

namespace HskyZhou\LaravelBackendPermission\User;

use HskyZhou\LaravelBackendPermission\Services\UserService;
use HskyZhou\LaravelBackendPermission\Resources\User\UserResource;
use HskyZhou\LaravelBackendPermission\Requests\User\UpdateRequest;
use DB;
use HskyZhou\LaravelBackendPermission\Controller\Controller;

/*用户详情*/
class UpdateController extends Controller {

	protected $moduleName = 'user';
	protected $controllerName = 'update';
	
	/**
	 * 用户详情
	 * @return [type] [description]
	 */
	public function __invoke(UpdateRequest $request, UserService $userService)
	{
		return DB::transaction(function () use ($userService) {
			$id = $this->getKeyId();

			$data = $this->getData();

			if (isset($data['password']) && $data['password']) {
				$data['password'] = bcrypt($data['password']);
			}

			/*修改用户*/
			$userInfo = $userService->userUpdate($data, $id);

			// 分配角色
			if ($roles = request('roles', [])) {
				$userInfo->syncRoles($roles);
			}

			// 分配权限
			if ($permissions = request('permissions', [])) {
				$userInfo->syncPermissions($permissions);
			}

			$info = new UserResource($userInfo);

			$data = [
				'info' => $info
			];

			return response()->hskyApi($data);
		});
	}
}