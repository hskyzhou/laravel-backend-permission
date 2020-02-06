<?php 

namespace HskyZhou\LaravelBackendPermission\Exceptions;

class ExceptionCode 
{
	/*查不到信息*/
	const NOT_FOUND_INFO_CODE = 10100;
	const NOT_FOUND_INFO_MESSAGE = "查不到信息";

	/*用户保存失败*/
	const USER_SAVE_FAIL_CODE = 10200;
	const USER_SAVE_FAIL_MESSAGE = "用户保存失败";
	/*用户修改失败*/
	const USER_UPDATE_FAIL_CODE = 10201;
	const USER_UPDATE_FAIL_MESSAGE = "用户修改失败";
	/*用户修改失败*/
	const USER_DELETE_FAIL_CODE = 10202;
	const USER_DELETE_FAIL_MESSAGE = "用户删除失败";

	/*角色保存失败*/
	const ROLE_SAVE_FAIL_CODE = 10203;
	const ROLE_SAVE_FAIL_MESSAGE = "角色保存失败";
	/*角色修改失败*/
	const ROLE_UPDATE_FAIL_CODE = 10204;
	const ROLE_UPDATE_FAIL_MESSAGE = "角色修改失败";
	/*角色修改失败*/
	const ROLE_DELETE_FAIL_CODE = 10205;
	const ROLE_DELETE_FAIL_MESSAGE = "角色删除失败";
	/*角色已经存在*/
	const ROLE_HAS_EXISTS_CODE = 10206;
	const ROLE_HAS_EXISTS_MESSAGE = "角色已经存在";

	/*权限保存失败*/
	const PERMISSION_SAVE_FAIL_CODE = 10207;
	const PERMISSION_SAVE_FAIL_MESSAGE = "权限保存失败";
	/*权限修改失败*/
	const PERMISSION_UPDATE_FAIL_CODE = 10208;
	const PERMISSION_UPDATE_FAIL_MESSAGE = "权限修改失败";
	/*权限修改失败*/
	const PERMISSION_DELETE_FAIL_CODE = 10209;
	const PERMISSION_DELETE_FAIL_MESSAGE = "权限删除失败";
	/*权限已经存在*/
	const PERMISSION_HAS_EXISTS_CODE = 10210;
	const PERMISSION_HAS_EXISTS_MESSAGE = "权限已经存在";

	/*菜单保存失败*/
	const MENU_SAVE_FAIL_CODE = 10211;
	const MENU_SAVE_FAIL_MESSAGE = "菜单保存失败";
	/*菜单修改失败*/
	const MENU_UPDATE_FAIL_CODE = 10212;
	const MENU_UPDATE_FAIL_MESSAGE = "菜单修改失败";
	/*菜单修改失败*/
	const MENU_DELETE_FAIL_CODE = 10213;
	const MENU_DELETE_FAIL_MESSAGE = "菜单删除失败";
}