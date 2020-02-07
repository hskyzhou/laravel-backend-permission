<?php 

namespace HskyZhou\LaravelBackendPermission\Services;

use HskyZhou\LaravelBackendPermission\Repositories\Interfaces\MenuRepository;
use HskyZhou\LaravelBackendPermission\Resources\Menu\Resource;

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
		return $this->menuRepository->with(['sonMenus', 'parentMenu'])->paginate();
	}

	/**
	 * 获取菜单详情
	 * @return [type] [description]
	 */
	public function menuInfo($id)
	{
		try {
			$info = $this->menuRepository->with(['parentMenu'])->find($id);

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
		$parentId = isset($data['parent_id']) && $data['parent_id'] ? $data['parent_id'] : null;
		unset($data['parent_id']);

		// 菜单保存失败
		if (!$info = $this->menuRepository->create($data)) {
			throw new \HskyZhou\LaravelBackendPermission\Exceptions\MenuSaveFailException();
		}

		if ($parentId) {
			if ($parentMenu = $this->menuRepository->with(['sonMenus'])->find($parentId)) {
				$sonMenusCount = $parentMenu->sonMenus->count();

				$info->parentMenu()->attach($parentMenu, ['sort' => $sonMenusCount]);
			}
		}

		return $info;
	}

	/**
	 * 保存菜单
	 * @return [type] [description]
	 */
	public function menuUpdate($data, $id)
	{
		$parentId = isset($data['parent_id']) && $data['parent_id'] ? $data['parent_id'] : null;
		unset($data['parent_id']);

		// 菜单保存失败
		if (!$info = $this->menuRepository->update($data, $id)) {
			throw new \HskyZhou\LaravelBackendPermission\Exceptions\MenuUpdateFailException();
		}

		if ($parentId) {
			if ($parentMenu = $this->menuRepository->find($parentId)) {
				$info->parentMenu()->detach();
				$info->parentMenu()->attach($parentMenu);
			}
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

	/**
	 * 菜单排序
	 * @return [type] [description]
	 */
	public function menuSort($menus, $parentMenu = null)
	{
		if ($menus) {
			foreach ($menus as $key => $val) {
				$id = $val['id'];

				$menu = $this->menuRepository->find($id);
				$menu->sonMenus()->detach();

				if ($parentMenu) {
					$menu->parentMenu()->attach($parentMenu, ['sort' => $key]);
				}

				if (isset($val['children']) && $val['children']) {
					$this->menuSort($val['children'], $menu);
				}
			}
		}
	}

	/**
	 * 处理递归
	 * @return [type] [description]
	 */
	public function dealRecursive($allMenus, $menus, $isFirstLevel = true)
	{
		$results = [];

		$allMenus = $allMenus->keyBy('id');

		$menus = $menus->keyBy('id');

		foreach($menus as $menu) {
			if ($menu->parentMenu->isEmpty() || !$isFirstLevel) {
				$info = new Resource($menu);
				$curMenu = $allMenus[$menu->id];
				$infoArray = $info->toArray(request());
				$results[] = array_merge($infoArray, [
					'children' => $this->dealRecursive($allMenus, $curMenu->sonMenus, false),
				]);
			}
		}

		return $results;
	}
}