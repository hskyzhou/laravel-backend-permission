<?php 

namespace HskyZhou\LaravelBackendPermission\Exceptions;

class NotFoundInfoException extends \Exception
{
	public $code = ExceptionCode::NOT_FOUND_INFO_CODE;

	public $message = ExceptionCode::NOT_FOUND_INFO_MESSAGE;
}