<?php

namespace HskyZhou\LaravelBackendPermission\User;

use HskyZhou\LaravelBackendPermission\Services\UserService;
use HskyZhou\LaravelBackendPermission\Resources\User\IndexCollection;
use HskyZhou\LaravelBackendPermission\Controller\Controller;
use Illuminate\Http\Request;

/*用户列表*/
class IndexController extends Controller {

	protected $moduleName = 'user';
	protected $controllerName = 'index';

	/**
	 * 用户列表
	 * @return [type] [description]
	 */
	public function __invoke(Request $request, UserService $userService)
	{
		$searchs = $this->getSearchs();

		/*获取用户列表*/
		$list = $userService->getUserListPaginate($searchs);
		$totalCount = $userService->getCount($searchs);

		$listCollection = (new IndexCollection($list))->toArray($request);

    	$data = array_merge($listCollection, [
    		'pageSize' => $list->perPage(),
    		'totalPage' => $list->total(),
    		'page' => request(config('setting.page_name', 'page'), 1),
    		'totalCount' => $totalCount,
    	]);

		return response()->hskyApi($data);
	}
}