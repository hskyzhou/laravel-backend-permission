<?php

namespace HskyZhou\LaravelBackendPermission\User;

use HskyZhou\LaravelBackendPermission\Services\UserService;
use HskyZhou\LaravelBackendPermission\Resources\User\UserResource;
use HskyZhou\LaravelBackendPermission\Requests\User\StoreRequest;
use HskyZhou\LaravelBackendPermission\Controller\Controller;
use DB;

/*用户详情*/
class StoreController extends Controller {
	
	protected $moduleName = 'user';
	protected $controllerName = 'store';

	/**
	 * 用户详情
	 * @return [type] [description]
	 */
	public function __invoke(StoreRequest $request, UserService $userService)
	{
		return DB::transaction(function () use ($userService) {
			$data = $this->getData();

			if (isset($data['password']) && $data['password']) {
				$data['password'] = bcrypt($data['password']);
			}

			/*获取用户列表*/
			$userInfo = $userService->userSave($data);

			// 分配角色
			if ($roles = request('roles', [])) {
				$userInfo->assignRole($roles);
			}

			// 分配权限
			if ($permissions = request('permissions', [])) {
				$userInfo->givePermissionTo($permissions);
			}

			$info = new UserResource($userInfo);

			$data = [
				'info' => $info
			];

			return response()->hskyApi($data);
		});

	}
}