<?php

namespace HskyZhou\LaravelBackendPermission\User;

use HskyZhou\LaravelBackendPermission\Services\UserService;
use HskyZhou\LaravelBackendPermission\Resources\User\IndexCollection as UserIndexCollection;
use HskyZhou\LaravelBackendPermission\Controller\Controller;

/*用户列表*/
class IndexController extends Controller {

	protected $moduleName = 'user';
	protected $controllerName = 'index';

	/**
	 * 用户列表
	 * @return [type] [description]
	 */
	public function __invoke(UserService $userService)
	{
		$searchs = $this->getSearchs();

		/*获取用户列表*/
		$userList = $userService->getUserListPaginate($searchs);

		$data = new UserIndexCollection($userList);

		return response()->hskyApi($data);
	}
}