<?php 

namespace HskyZhou\LaravelBackendPermission\Services;

use HskyZhou\LaravelBackendPermission\Repositories\Interfaces\PermissionRepository;

class PermissionService
{
	protected $permissionRepository;

	public function __construct(PermissionRepository $permissionRepository)
	{
		$this->permissionRepository = $permissionRepository;
	}

	/**
	 * 获取用户列表
	 * @return [type] [description]
	 */
	public function getPermissionListPaginate($searchs = [])
	{
		return $this->permissionRepository->searchByFields($searchs)->paginate();
	}

	/**
	 * 获取总记录数
	 * @return [type] [description]
	 */
	public function getCount($searchs)
	{
		return $this->permissionRepository->searchByFields($searchs)->count();
	}

	/**
	 * 获取用户详情
	 * @return [type] [description]
	 */
	public function permissionInfo($id)
	{
		try {
			$info = $this->permissionRepository->find($id);

			return $info;
		} catch (\Exception $e) {
			throw new \HskyZhou\LaravelBackendPermission\Exceptions\NotFoundInfoException();
		}
	}

	/**
	 * 保存用户
	 * @return [type] [description]
	 */
	public function permissionSave($data)
	{
		// 角色已经存在
		if ($this->permissionRepository->isExistsByGuardNameAndName($data['name'], $data['guard_name'])) {
			throw new \HskyZhou\LaravelBackendPermission\Exceptions\PermissionHasExistsException();
		}

		// 角色保存失败
		if (!$info = $this->permissionRepository->create($data)) {
			throw new \HskyZhou\LaravelBackendPermission\Exceptions\PermissionSaveFailException();
		}

		return $info;
	}

	/**
	 * 保存用户
	 * @return [type] [description]
	 */
	public function permissionUpdate($data, $id)
	{
		try {
			// 角色已经存在
			if ($this->permissionRepository->isExistsByGuardNameAndName($data['name'], $data['guard_name'], $id)) {
				throw new \HskyZhou\LaravelBackendPermission\Exceptions\PermissionHasExistsException();
			}

			// 角色保存失败
			if (!$info = $this->permissionRepository->update($data, $id)) {
				throw new \HskyZhou\LaravelBackendPermission\Exceptions\PermissionUpdateFailException();
			}
			
			return $info;
		} catch (\Exception $e) {
			throw new \HskyZhou\LaravelBackendPermission\Exceptions\PermissionUpdateFailException();
		}

	}

	/**
	 * 删除用户
	 * @return [type] [description]
	 */
	public function permissionDelete($id)
	{
		try {
			if (! $this->permissionRepository->delete($id)) {
				throw new \HskyZhou\LaravelBackendPermission\Exceptions\PermissionDeleteFailException();
			}
		} catch (\Exception $e) {
			throw new \HskyZhou\LaravelBackendPermission\Exceptions\PermissionDeleteFailException();
		}

		return true;
	}
}