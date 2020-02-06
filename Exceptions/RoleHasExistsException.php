<?php 

namespace HskyZhou\LaravelBackendPermission\Exceptions;

class RoleHasExistsException extends \Exception
{
	public $code = ExceptionCode::ROLE_HAS_EXISTS_CODE;

	public $message = ExceptionCode::ROLE_HAS_EXISTS_MESSAGE;
}