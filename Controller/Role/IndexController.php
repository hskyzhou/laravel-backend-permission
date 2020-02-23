<?php

namespace HskyZhou\LaravelBackendPermission\Role;

use HskyZhou\LaravelBackendPermission\Services\RoleService;
use HskyZhou\LaravelBackendPermission\Resources\Role\IndexCollection;
use HskyZhou\LaravelBackendPermission\Controller\Controller;
use Illuminate\Http\Request;

/*用户列表*/
class IndexController extends Controller {

	protected $moduleName = 'role';
	protected $controllerName = 'index';

	/**
	 * 用户列表
	 * @return [type] [description]
	 */
	public function __invoke(Request $request, RoleService $roleService)
	{
		$searchs = $this->getSearchs();

		/*获取用户列表*/
		$list = $roleService->getRoleListPaginate($searchs);
		$totalCount = $roleService->getCount($searchs);

		$listCollection = new IndexCollection($list);
		$listCollection = $listCollection->toArray($request);

		$data = array_merge($listCollection, [
    		'pageSize' => $list->perPage(),
    		'totalPage' => $list->total(),
    		'page' => request(config('setting.page_name', 'page'), 1),
    		'totalCount' => $totalCount,
    	]);

		return response()->hskyApi($data);
	}
}