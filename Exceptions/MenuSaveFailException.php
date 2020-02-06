<?php 

namespace HskyZhou\LaravelBackendPermission\Exceptions;

class MenuSaveFailException extends \Exception
{
	public $code = ExceptionCode::MENU_SAVE_FAIL_CODE;

	public $message = ExceptionCode::MENU_SAVE_FAIL_MESSAGE;
}