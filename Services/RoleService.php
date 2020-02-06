<?php 

namespace HskyZhou\LaravelBackendPermission\Services;

use HskyZhou\LaravelBackendPermission\Repositories\Interfaces\RoleRepository;

class RoleService
{
	protected $roleRepository;

	public function __construct(RoleRepository $roleRepository)
	{
		$this->roleRepository = $roleRepository;
	}

	/**
	 * 获取用户列表
	 * @return [type] [description]
	 */
	public function getRoleListPaginate($searchs = [])
	{
		return $this->roleRepository->searchByFields($searchs)->paginate();
	}

	/**
	 * 获取用户详情
	 * @return [type] [description]
	 */
	public function roleInfo($id)
	{
		try {
			$info = $this->roleRepository->findOrFail($id);

			return $info;
		} catch (\Exception $e) {
			throw new \HskyZhou\LaravelBackendPermission\Exceptions\NotFoundInfoException();
		}
	}

	/**
	 * 保存用户
	 * @return [type] [description]
	 */
	public function roleSave($data)
	{
		// 角色已经存在
		if ($this->roleRepository->isExistsByGuardNameAndName($data['name'], $data['guard_name'])) {
			throw new \HskyZhou\LaravelBackendPermission\Exceptions\RoleHasExistsException();
		}

		// 角色保存失败
		if (!$info = $this->roleRepository->create($data)) {
			throw new \HskyZhou\LaravelBackendPermission\Exceptions\RoleSaveFailException();
		}

		return $info;
	}

	/**
	 * 保存用户
	 * @return [type] [description]
	 */
	public function roleUpdate($data, $id)
	{
		// 角色已经存在
		if ($this->roleRepository->isExistsByGuardNameAndName($data['name'], $data['guard_name'], $id)) {
			throw new \HskyZhou\LaravelBackendPermission\Exceptions\RoleHasExistsException();
		}

		// 角色保存失败
		if (!$info = $this->roleRepository->update($data, $id)) {
			throw new \HskyZhou\LaravelBackendPermission\Exceptions\RoleUpdateFailException();
		}

		return $info;
	}

	/**
	 * 删除用户
	 * @return [type] [description]
	 */
	public function roleDelete($id)
	{
		try {
			if (! $this->roleRepository->delete($id)) {
				throw new \HskyZhou\LaravelBackendPermission\Exceptions\RoleDeleteFailException();
			}
		} catch (\Exception $e) {
			throw new \HskyZhou\LaravelBackendPermission\Exceptions\RoleDeleteFailException();
		}

		return true;
	}
}