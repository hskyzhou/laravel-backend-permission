<?php 

namespace HskyZhou\LaravelBackendPermission\Exceptions;

class PermissionHasExistsException extends \Exception
{
	public $code = ExceptionCode::PERMISSION_HAS_EXISTS_CODE;

	public $message = ExceptionCode::PERMISSION_HAS_EXISTS_MESSAGE;
}