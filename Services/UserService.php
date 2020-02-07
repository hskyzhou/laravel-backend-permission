<?php 

namespace HskyZhou\LaravelBackendPermission\Services;

use HskyZhou\LaravelBackendPermission\Repositories\Interfaces\UserRepository;

class UserService
{
	protected $userRepository;

	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	/**
	 * 获取用户列表
	 * @return [type] [description]
	 */
	public function getUserListPaginate($searchs = [])
	{
		return $this->userRepository->with(['roles', 'permissions'])->searchByFields($searchs)->paginate();
	}

	/**
	 * 获取用户详情
	 * @return [type] [description]
	 */
	public function userInfo($userId)
	{
		try {
			$info = $this->userRepository->with(['roles', 'permissions'])->find($userId);

			return $info;
		} catch (\Exception $e) {
			throw new \HskyZhou\LaravelBackendPermission\Exceptions\NotFoundInfoException();
		}
	}

	/**
	 * 保存用户
	 * @return [type] [description]
	 */
	public function userSave($data)
	{
		if (!$info = $this->userRepository->create($data)) {
			throw new \HskyZhou\LaravelBackendPermission\Exceptions\UserSaveFailException();
		}

		return $info;
	}

	/**
	 * 保存用户
	 * @return [type] [description]
	 */
	public function userUpdate($data, $id)
	{
		try {
			if (!$info = $this->userRepository->update($data, $id)) {
				throw new \HskyZhou\LaravelBackendPermission\Exceptions\UserUpdateFailException();
			}
		} catch (\Exception $e) {
			dd($e);
			throw new \HskyZhou\LaravelBackendPermission\Exceptions\UserUpdateFailException();
		}

		return $info;
	}

	/**
	 * 删除用户
	 * @return [type] [description]
	 */
	public function userDelete($id)
	{
		try {
			if (! $this->userRepository->delete($id)) {
				throw new \HskyZhou\LaravelBackendPermission\Exceptions\UserDeleteFailException();
			}
		} catch (\Exception $e) {
			throw new \HskyZhou\LaravelBackendPermission\Exceptions\UserDeleteFailException();
		}

		return true;
	}
}