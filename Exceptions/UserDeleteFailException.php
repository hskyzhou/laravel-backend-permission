<?php 

namespace HskyZhou\LaravelBackendPermission\Exceptions;

class UserDeleteFailException extends \Exception
{
	public $code = ExceptionCode::USER_DELETE_FAIL_CODE;

	public $message = ExceptionCode::USER_DELETE_FAIL_MESSAGE;
}