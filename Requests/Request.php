<?php 

namespace HskyZhou\LaravelBackendPermission\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
	protected $configFile = 'laravel-backend-permission';
	protected $controllersKey = 'controllers';
	protected $moduleName = '';
	protected $controllerName = '';
	protected $fieldsName = 'fields';

	/**
	 * 获取request的规则
	 * @param  [type] $action [description]
	 * @param  [type] $key    [description]
	 * @return [type]         [description]
	 */
	public function rules()
	{
		$rules = [];

		$allowedRuleFields = $this->getAllowedFields();

        $fields = $this->getFields();

        foreach ($fields as $key => $val) {
            if (in_array($key, $allowedRuleFields) && isset($val['rules'])) {
                $rules[$key] = $val['rules'];
            }
        }

        return $rules;
	}

	/**
	 * 获取request的message
	 * @return [type] [description]
	 */
	public function messages()
	{
		$messages = [];

        $allowedRuleFields = $this->getAllowedFields();

        $fields = $this->getFields();

        foreach ($fields as $key => $val) {
            if (in_array($key, $allowedRuleFields) && isset($val['messages'])) {
                foreach ($val['messages'] as $rule => $message) {
                    $messages[$key . '.' . $rule] = $message;
                }
            }
        }

        return $messages;
	}

	// 获取字段名称
	protected function getFields()
	{
		return config($this->configFile . '.' . $this->moduleName . '.' . $this->fieldsName);
	}

	// 获取参数
	protected function getParams($key)
	{
		return config($this->configFile . '.' . $this->moduleName . '.' . $this->controllersKey . '.' . $this->controllerName  . '.' . $key);
	}

	/**
	 * 获取允许的字段
	 * @return [type] [description]
	 */
	public function getAllowedFields()
	{
		$allowedRuleFields = [];

		$keyArr = ['key_id', 'params'];
		foreach ($keyArr as $curKey => $curVal) {
	        if ($curRuleFields = $this->getParams($curVal)) {
	        	$allowedRuleFields = array_merge($allowedRuleFields, (is_array($curRuleFields) ? $curRuleFields : [$curRuleFields]));
	        }
		}

		return $allowedRuleFields;
	}
}