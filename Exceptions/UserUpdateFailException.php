<?php 

namespace HskyZhou\LaravelBackendPermission\Exceptions;

class UserUpdateFailException extends \Exception
{
	public $code = ExceptionCode::USER_UPDATE_FAIL_CODE;

	public $message = ExceptionCode::USER_UPDATE_FAIL_MESSAGE;
}