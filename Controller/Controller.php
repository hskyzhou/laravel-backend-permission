<?php 

namespace HskyZhou\LaravelBackendPermission\Controller;

class Controller
{
	protected $configFile = 'laravel-backend-permission';
	protected $controllersKey = 'controllers';
	protected $moduleName = '';
	protected $controllerName = '';
	protected $paramKey = 'params';
	protected $keyIdKey = 'key_id';
	protected $fieldsName = 'fields';
	protected $searchName = 'searchs';

	/**
	 * 获取数据
	 * @return [type] [description]
	 */
	public function getData()
	{
		$params = config($this->configFile . '.' . $this->moduleName . '.' . $this->controllersKey . '.' . $this->controllerName . '.' . $this->paramKey);

		return request()->only($params);
	}

	/**
	 * 获取id
	 * @return [type] [description]
	 */
	public function getKeyId()
	{
		$keyId = config($this->configFile . '.' . $this->moduleName . '.' . $this->controllersKey . '.' . $this->controllerName . '.' . $this->keyIdKey);

		return request($keyId);
	}

	/**
	 * 获取搜索
	 * @return [type] [description]
	 */
	public function getSearchs()
	{
		$fields = $this->getSearchFields();

		$searchs = [];

        foreach ($fields as $field => $arr) {
        	$param = $arr['param'];
        	$operation = $arr['operation'];

        	$value = request($param, '');

            if ($value) {
                $searchs[$field] = [
                	'field' => $field,
                	'operation' => $operation,
                	'value' => $value
                ];
            }
        }

        return $searchs;
	}

	// 获取字段名称
	protected function getSearchFields()
	{
		return config($this->configFile . '.' . $this->moduleName . '.' . $this->controllersKey . '.' . $this->controllerName . '.' . $this->searchName);
	}
}