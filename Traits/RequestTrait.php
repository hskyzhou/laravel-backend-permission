<?php 

namespace HskyZhou\LaravelBackendPermission\Traits;

Trait RequestTrait
{
	/**
	 * 获取request的规则
	 * @param  [type] $action [description]
	 * @param  [type] $key    [description]
	 * @return [type]         [description]
	 */
	public function getRequestRules($ruleFieldKey, $key)
	{
		$rules = [];

		$allowedRuleFields = $this->getAllowedFields($ruleFieldKey);

        $fields = config($key);

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
	public function getRequestMessages($ruleFieldKey, $key)
	{
		$messages = [];

        $allowedRuleFields = $this->getAllowedFields($ruleFieldKey);

        $fields = config($key);

        foreach ($fields as $key => $val) {
            if (in_array($key, $allowedRuleFields) && isset($val['messages'])) {
                foreach ($val['messages'] as $rule => $message) {
                    $messages[$key . '.' . $rule] = $message;
                }
            }
        }

        return $messages;
	}

	/**
	 * 获取允许的字段
	 * @return [type] [description]
	 */
	public function getAllowedFields($ruleFieldKey)
	{
		$allowedRuleFields = [];

		$keyArr = ['key_id', 'params'];
		foreach ($keyArr as $curKey => $curVal) {
	        if ($curRuleFields = config($ruleFieldKey . '.' . $curVal)) {
	        	$allowedRuleFields = array_merge($allowedRuleFields, (is_array($curRuleFields) ? $curRuleFields : [$curRuleFields]));
	        }
		}

		return $allowedRuleFields;
	}
}