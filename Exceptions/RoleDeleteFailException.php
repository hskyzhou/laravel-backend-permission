<?php 

namespace HskyZhou\LaravelBackendPermission\Exceptions;

class RoleDeleteFailException extends \Exception
{
	public $code = ExceptionCode::ROLE_DELETE_FAIL_CODE;

	public $message = ExceptionCode::ROLE_DELETE_FAIL_MESSAGE;
}