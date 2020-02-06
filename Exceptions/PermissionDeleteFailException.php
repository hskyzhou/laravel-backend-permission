<?php 

namespace HskyZhou\LaravelBackendPermission\Exceptions;

class PermissionDeleteFailException extends \Exception
{
	public $code = ExceptionCode::PERMISSION_DELETE_FAIL_CODE;

	public $message = ExceptionCode::PERMISSION_DELETE_FAIL_MESSAGE;
}