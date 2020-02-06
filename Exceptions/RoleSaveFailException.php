<?php 

namespace HskyZhou\LaravelBackendPermission\Exceptions;

class RoleSaveFailException extends \Exception
{
	public $code = ExceptionCode::ROLE_SAVE_FAIL_CODE;

	public $message = ExceptionCode::ROLE_SAVE_FAIL_MESSAGE;
}