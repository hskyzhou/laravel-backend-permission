<?php

namespace HskyZhou\LaravelBackendPermission\Permission;

use HskyZhou\LaravelBackendPermission\Services\PermissionService;
use HskyZhou\LaravelBackendPermission\Resources\Permission\IndexCollection;
use HskyZhou\LaravelBackendPermission\Controller\Controller;
use Illuminate\Http\Request;

/*用户列表*/
class IndexController extends Controller {

	protected $moduleName = 'permission';
	protected $controllerName = 'index';

	/**
	 * 用户列表
	 * @return [type] [description]
	 */
	public function __invoke(Request $request, PermissionService $service)
	{
		$searchs = $this->getSearchs();

		/*获取用户列表*/
		$list = $service->getPermissionListPaginate($searchs);
		$totalCount = $service->getCount($searchs);

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