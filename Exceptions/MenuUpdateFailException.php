<?php 

namespace HskyZhou\LaravelBackendPermission\Exceptions;

class MenuUpdateFailException extends \Exception
{
	public $code = ExceptionCode::MENU_UPDATE_FAIL_CODE;

	public $message = ExceptionCode::MENU_UPDATE_FAIL_MESSAGE;
}