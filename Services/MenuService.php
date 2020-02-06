<?php 

namespace HskyZhou\LaravelBackendPermission\Services;

use HskyZhou\LaravelBackendPermission\Repositories\Interfaces\MenuRepository;

class MenuService
{
	protected $menuRepository;

	public function __construct(MenuRepository $menuRepository)
	{
		$this->menuRepository = $menuRepository;
	}

	/**
	 * 获取菜单列表
	 * @return [type] [description]
	 */
	public function getMenuListPaginate()
	{
		return $this->menuRepository->paginate();
	}

	/**
	 * 获取菜单详情
	 * @return [type] [description]
	 */
	public function menuInfo($id)
	{
		try {
			$info = $this->menuRepository->find($id);

			return $info;
		} catch (\Exception $e) {
			throw new \HskyZhou\LaravelBackendPermission\Exceptions\NotFoundInfoException();
		}
	}

	/**
	 * 保存菜单
	 * @return [type] [description]
	 */
	public function menuSave($data)
	{
		// 菜单保存失败
		if (!$info = $this->menuRepository->create($data)) {
			throw new \HskyZhou\LaravelBackendPermission\Exceptions\MenuSaveFailException();
		}

		return $info;
	}

	/**
	 * 保存菜单
	 * @return [type] [description]
	 */
	public function menuUpdate($data, $id)
	{
		// 菜单保存失败
		if (!$info = $this->menuRepository->update($data, $id)) {
			throw new \HskyZhou\LaravelBackendPermission\Exceptions\MenuUpdateFailException();
		}

		return $info;
	}

	/**
	 * 删除菜单
	 * @return [type] [description]
	 */
	public function menuDelete($id)
	{
		try {
			if (! $this->menuRepository->delete($id)) {
				throw new \HskyZhou\LaravelBackendPermission\Exceptions\MenuDeleteFailException();
			}
		} catch (\Exception $e) {
			throw new \HskyZhou\LaravelBackendPermission\Exceptions\MenuDeleteFailException();
		}

		return true;
	}
}