<?php 

namespace HskyZhou\LaravelBackendPermission\Exceptions;

class UserSaveFailException extends \Exception
{
	public $code = ExceptionCode::USER_SAVE_FAIL_CODE;

	public $message = ExceptionCode::USER_SAVE_FAIL_MESSAGE;
}