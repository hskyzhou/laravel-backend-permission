<?php 

namespace HskyZhou\LaravelBackendPermission\Exceptions;

class RoleUpdateFailException extends \Exception
{
	public $code = ExceptionCode::ROLE_UPDATE_FAIL_CODE;

	public $message = ExceptionCode::ROLE_UPDATE_FAIL_MESSAGE;
}