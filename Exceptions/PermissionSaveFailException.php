<?php 

namespace HskyZhou\LaravelBackendPermission\Exceptions;

class PermissionSaveFailException extends \Exception
{
	public $code = ExceptionCode::PERMISSION_SAVE_FAIL_CODE;

	public $message = ExceptionCode::PERMISSION_SAVE_FAIL_MESSAGE;
}