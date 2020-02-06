<?php

namespace HskyZhou\LaravelBackendPermission\User;

use HskyZhou\LaravelBackendPermission\Services\UserService;
use HskyZhou\LaravelBackendPermission\Requests\User\DeleteRequest;
use HskyZhou\LaravelBackendPermission\Controller\Controller;

/*用户详情*/
class DeleteController extends Controller {

	protected $moduleName = 'user';
	protected $controllerName = 'delete';

	/**
	 * 用户详情
	 * @return [type] [description]
	 */
	public function __invoke(DeleteRequest $request, UserService $userService)
	{
		// 获取搜索的用户id
		$id = $this->getKeyId();

		/*修改用户*/
		$userService->userDelete($id);


		return response()->hskyApi();
	}
}