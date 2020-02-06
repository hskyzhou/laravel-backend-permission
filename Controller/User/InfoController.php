<?php

namespace HskyZhou\LaravelBackendPermission\User;

use HskyZhou\LaravelBackendPermission\Services\UserService;
use HskyZhou\LaravelBackendPermission\Resources\User\UserResource;
use HskyZhou\LaravelBackendPermission\Requests\User\InfoRequest;
use HskyZhou\LaravelBackendPermission\Controller\Controller;

/*用户详情*/
class InfoController extends Controller {

	protected $moduleName = 'user';
	protected $controllerName = 'info';

	/**
	 * 用户详情
	 * @return [type] [description]
	 */
	public function __invoke(InfoRequest $request, UserService $userService)
	{
		// 获取搜索的用户id
		$id = $this->getKeyId();

		/*获取用户列表*/
		$userInfo = $userService->userInfo($id);

		$info = new UserResource($userInfo);

		$data = [
			'info' => $info
		];

		return response()->hskyApi($data);
	}
}