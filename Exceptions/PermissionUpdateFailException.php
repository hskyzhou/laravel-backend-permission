<?php 

namespace HskyZhou\LaravelBackendPermission\Exceptions;

class PermissionUpdateFailException extends \Exception
{
	public $code = ExceptionCode::PERMISSION_UPDATE_FAIL_CODE;

	public $message = ExceptionCode::PERMISSION_UPDATE_FAIL_MESSAGE;
}