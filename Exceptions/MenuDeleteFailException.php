<?php 

namespace HskyZhou\LaravelBackendPermission\Exceptions;

class MenuDeleteFailException extends \Exception
{
	public $code = ExceptionCode::MENU_DELETE_FAIL_CODE;

	public $message = ExceptionCode::MENU_DELETE_FAIL_MESSAGE;
}