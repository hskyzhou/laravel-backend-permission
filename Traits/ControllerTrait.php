<?php 

namespace HskyZhou\LaravelBackendPermission\Traits;

Trait ControllerTrait
{
	/**
	 * 获取请求的参数
	 * @param  [type] $key [description]
	 * @return [type]      [description]
	 */
	public function getControllerParams($key)
    {
        $fieldsArray = config($key);
        $fields = [];

        foreach ($fieldsArray as $key => $val) {
            if ($val['resource']) {
                $fields[] = $key;
            }
        }

        return $fields;
    }
}